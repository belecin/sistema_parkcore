<?php

namespace App\Http\Controllers;

use App\Models\Facturacion;
use App\Models\Ajuste;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;

class ReporteController extends Controller
{
    /**
     * Mostrar la página principal de reportes
     */
    public function index()
    {
        // Obtener el año actual
        $anioActual = now()->year;
        
        // Crear array de años disponibles (desde 2020 hasta el año actual)
        $anios = [];
        for ($i = 2020; $i <= $anioActual; $i++) {
            $anios[] = $i;
        }
        
        // Meses en español
        $meses = [
            1 => 'Enero',
            2 => 'Febrero',
            3 => 'Marzo',
            4 => 'Abril',
            5 => 'Mayo',
            6 => 'Junio',
            7 => 'Julio',
            8 => 'Agosto',
            9 => 'Septiembre',
            10 => 'Octubre',
            11 => 'Noviembre',
            12 => 'Diciembre',
        ];
        
        // Semana actual
        $mesActual = now()->month;
        $inicioSemana = now()->startOfWeek()->format('Y-m-d');
        $finSemana = now()->endOfWeek()->format('Y-m-d');
        
        return view('admin.reportes.index', compact(
            'anios',
            'meses',
            'anioActual',
            'mesActual',
            'inicioSemana',
            'finSemana'
        ));
    }

    /**
     * Generar reporte semanal en PDF
     */
    public function reporteSemanal(Request $request)
    {
        // Validar datos
        $validated = $request->validate([
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
        ]);

        $fechaInicio = $validated['fecha_inicio'];
        $fechaFin = $validated['fecha_fin'];

        // Obtener facturaciones del rango
        $facturaciones = Facturacion::whereBetween('created_at', [
            $fechaInicio . ' 00:00:00',
            $fechaFin . ' 23:59:59'
        ])
        ->with('usuario', 'ticket.cliente', 'ticket.vehiculo')
        ->orderBy('created_at', 'desc')
        ->get();

        // Obtener ajustes (divisa, nombre del sistema, etc.)
        $ajuste = Ajuste::first();

        // Calcular total
        $total = $facturaciones->sum('monto');

        // Preparar datos para la vista
        $datos = [
            'facturaciones' => $facturaciones,
            'ajuste' => $ajuste,
            'fecha_inicio' => $fechaInicio,
            'fecha_fin' => $fechaFin,
            'total' => $total,
            'usuario' => Auth::user()->name,
        ];

        // Generar PDF
        $pdf = Pdf::loadView('admin.reportes.semanal', $datos)
                   ->setPaper('a4')
                   ->setOption('margin-top', 10)
                   ->setOption('margin-bottom', 10);

        return $pdf->download('reporte-semanal-' . $fechaInicio . '_' . $fechaFin . '.pdf');
    }

    /**
     * Generar reporte mensual en PDF
     */
    public function reporteMensual(Request $request)
    {
        // Validar datos
        $validated = $request->validate([
            'year' => 'required|integer|min:2020',
            'mes' => 'required|integer|min:1|max:12',
        ]);

        $year = $validated['year'];
        $mes = $validated['mes'];

        // Obtener facturaciones del mes
        $facturaciones = Facturacion::whereYear('created_at', $year)
            ->whereMonth('created_at', $mes)
            ->with('usuario', 'ticket.cliente', 'ticket.vehiculo')
            ->orderBy('created_at', 'desc')
            ->get();

        // Obtener ajustes
        $ajuste = Ajuste::first();

        // Calcular total
        $total = $facturaciones->sum('monto');

        // Meses en español
        $meses = [
            1 => 'Enero',
            2 => 'Febrero',
            3 => 'Marzo',
            4 => 'Abril',
            5 => 'Mayo',
            6 => 'Junio',
            7 => 'Julio',
            8 => 'Agosto',
            9 => 'Septiembre',
            10 => 'Octubre',
            11 => 'Noviembre',
            12 => 'Diciembre',
        ];

        $nombreMes = $meses[$mes];

        // Preparar datos para la vista
        $datos = [
            'facturaciones' => $facturaciones,
            'ajuste' => $ajuste,
            'year' => $year,
            'mes' => $mes,
            'nombreMes' => $nombreMes,
            'total' => $total,
            'usuario' => Auth::user()->name,
        ];

        // Generar PDF
        $pdf = Pdf::loadView('admin.reportes.mensual', $datos)
                   ->setPaper('a4')
                   ->setOption('margin-top', 10)
                   ->setOption('margin-bottom', 10);

        return $pdf->download('reporte-mensual-' . $nombreMes . '-' . $year . '.pdf');
    }

    /**
     * Generar reporte de ingresos diarios en PDF
     */
    public function ingresosDiarios(Request $request)
    {
        // Validar datos
        $validated = $request->validate([
            'year' => 'required|integer|min:2020',
            'mes' => 'required|integer|min:1|max:12',
        ]);

        $year = $validated['year'];
        $mes = $validated['mes'];

        // Obtener ingresos agrupados por día
        $ingresosDiarios = Facturacion::selectRaw('DATE(created_at) as fecha, SUM(monto) as total_dia, COUNT(*) as cantidad_servicios')
            ->whereYear('created_at', $year)
            ->whereMonth('created_at', $mes)
            ->groupBy(DB::raw('DATE(created_at)'))
            ->orderBy('fecha', 'asc')
            ->get();

        // Calcular indicadores
        $totalMes = $ingresosDiarios->sum('total_dia');
        $promedioDiario = $ingresosDiarios->count() > 0 ? $totalMes / $ingresosDiarios->count() : 0;
        $mejorDia = $ingresosDiarios->max('total_dia');

        // Obtener ajustes
        $ajuste = Ajuste::first();

        // Meses en español
        $meses = [
            1 => 'Enero',
            2 => 'Febrero',
            3 => 'Marzo',
            4 => 'Abril',
            5 => 'Mayo',
            6 => 'Junio',
            7 => 'Julio',
            8 => 'Agosto',
            9 => 'Septiembre',
            10 => 'Octubre',
            11 => 'Noviembre',
            12 => 'Diciembre',
        ];

        $nombreMes = $meses[$mes];

        // Preparar datos para la vista
        $datos = [
            'ingresosDiarios' => $ingresosDiarios,
            'totalMes' => $totalMes,
            'promedioDiario' => $promedioDiario,
            'mejorDia' => $mejorDia,
            'ajuste' => $ajuste,
            'year' => $year,
            'mes' => $mes,
            'nombreMes' => $nombreMes,
            'usuario' => Auth::user()->name,
        ];

        // Generar PDF
        $pdf = Pdf::loadView('admin.reportes.ingresosdiarios', $datos)
                   ->setPaper('a4')
                   ->setOption('margin-top', 10)
                   ->setOption('margin-bottom', 10);

        return $pdf->download('reporte-ingresos-diarios-' . $nombreMes . '-' . $year . '.pdf');
    }
}
