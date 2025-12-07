<?php

namespace App\Http\Controllers;

use App\Models\Ajuste;
use App\Models\Cliente;
use App\Models\Espacio;
use App\Models\Tarifa;
use App\Models\Ticket;
use App\Models\Vehiculo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ajuste = Ajuste::first();
        $espacios = Espacio::all();
        $vehiculos = Vehiculo::with('cliente')->get();
        $tarifas = Tarifa::all();
        //return response()->json($vehiculos);
        return view('admin.tickets.index', compact('espacios','ajuste','vehiculos','tarifas'));
    }

    public function buscar_vehiculo($id){
        $vehiculo = Vehiculo::with('cliente')->find($id);
        return view('admin.tickets.buscar_vehiculo',compact('vehiculo'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //return response()->json($request->all());
        $request->validate([
            'espacio_id' => 'required',
            'vehiculo_id' => 'required',
            'tarifa_id' => 'required',
        ]);

        $vehiculo = Vehiculo::find($request->vehiculo_id);
        Auth::user()->id;
        $ticket = new Ticket();
        $ticket->espacio_id = $request->espacio_id;
        $ticket->cliente_id = $vehiculo->cliente_id;
        $ticket->vehiculo_id = $request->vehiculo_id;
        $ticket->tarifa_id = $request->tarifa_id;
        $ticket->usuario_id = Auth::user()->id;

        //generar codigo del ticket 
        $ultimo_ticket = DB::table('tickets')->max('id');
        $siguiente_ticket = $ultimo_ticket ? $ultimo_ticket + 1: 1;
        $codigo_ticket ='TK- '.$siguiente_ticket;
    

        $ticket->tarifa_id = $request->tarifa_id;


        $ticket->save();

        return redirect()->route('admin.ticketes.index')
        ->with('mensaje', 'ticket registrado correctamente')
        ->with('icono','success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ticket $ticket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket)
    {
        //
    }
}
