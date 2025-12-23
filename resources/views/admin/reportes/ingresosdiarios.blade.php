<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Reporte de Ingresos Diarios</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: Arial, sans-serif;
            color: #333;
            line-height: 1.6;
        }
        
        .container {
            max-width: 900px;
            margin: 0 auto;
            padding: 20px;
        }
        
        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #333;
            padding-bottom: 15px;
        }
        
        .header h1 {
            color: #1f7e0f;
            font-size: 24px;
            margin-bottom: 5px;
        }
        
        .header p {
            color: #666;
            font-size: 12px;
        }
        
        .info-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
            padding: 10px;
            background-color: #f5f5f5;
            border-radius: 4px;
        }
        
        .info-row p {
            font-size: 12px;
            margin: 3px 0;
        }
        
        .info-label {
            font-weight: bold;
            color: #333;
        }
        
        .info-value {
            color: #1f7e0f;
            font-weight: bold;
        }
        
        /* Tarjetas Resumen */
        .summary-cards {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
            margin-bottom: 30px;
        }
        
        .card {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 20px;
            border-radius: 8px;
            color: white;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        
        .card.total {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        }
        
        .card.promedio {
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        }
        
        .card.mejor {
            background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
        }
        
        .card-label {
            font-size: 11px;
            opacity: 0.9;
            margin-bottom: 8px;
            text-transform: uppercase;
            font-weight: bold;
            letter-spacing: 0.5px;
        }
        
        .card-value {
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 3px;
        }
        
        .card-currency {
            font-size: 11px;
            opacity: 0.8;
        }
        
        .no-data {
            text-align: center;
            padding: 30px;
            color: #999;
            font-style: italic;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        
        table thead {
            background-color: #1f7e0f;
            color: white;
        }
        
        table th {
            padding: 12px;
            text-align: left;
            font-size: 12px;
            font-weight: bold;
            border: 1px solid #1f7e0f;
        }
        
        table td {
            padding: 10px;
            border: 1px solid #ddd;
            font-size: 11px;
        }
        
        table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        
        table tbody tr:hover {
            background-color: #f0f0f0;
        }
        
        .status-badge {
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 10px;
            font-weight: bold;
            text-align: center;
        }
        
        .status-mejor {
            background-color: #c8e6c9;
            color: #2e7d32;
        }
        
        .status-peor {
            background-color: #ffccbc;
            color: #d84315;
        }
        
        .total-row {
            font-weight: bold;
            background-color: #e8f5e9;
            color: #1f7e0f;
        }
        
        .total-row td {
            border: 2px solid #1f7e0f;
        }
        
        .footer {
            margin-top: 30px;
            padding-top: 15px;
            border-top: 1px solid #ddd;
            text-align: center;
            font-size: 11px;
            color: #666;
        }
        
        .footer-item {
            display: inline-block;
            margin: 0 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <h1>REPORTE DE INGRESOS DIARIOS</h1>
            <p>Generado: {{ \Carbon\Carbon::now()->format('d/m/Y H:i:s') }}</p>
        </div>

        <!-- Info del Período -->
        <div class="info-row">
            <div>
                <p><span class="info-label">Período:</span> 
                    <span class="info-value">
                        {{ $nombreMes }} de {{ $year }}
                    </span>
                </p>
            </div>
            <div>
                <p><span class="info-label">Sistema:</span> <span class="info-value">{{ $ajuste->nombre ?? 'N/A' }}</span></p>
            </div>
        </div>

        <!-- Tarjetas de Resumen -->
        @if($ingresosDiarios->isNotEmpty())
            <div class="summary-cards">
                <div class="card total">
                    <div class="card-label">Ingreso Total del Mes</div>
                    <div class="card-value">{{ number_format($totalMes, 2) }}</div>
                    <div class="card-currency">{{ $ajuste->divisa ?? '$' }}</div>
                </div>
                
                <div class="card promedio">
                    <div class="card-label">Promedio Diario</div>
                    <div class="card-value">{{ number_format($promedioDiario, 2) }}</div>
                    <div class="card-currency">{{ $ajuste->divisa ?? '$' }}</div>
                </div>
                
                <div class="card mejor">
                    <div class="card-label">Mejor Día</div>
                    <div class="card-value">{{ number_format($mejorDia, 2) }}</div>
                    <div class="card-currency">{{ $ajuste->divisa ?? '$' }}</div>
                </div>
            </div>
        @endif

        <!-- Contenido -->
        @if($ingresosDiarios->isEmpty())
            <div class="no-data">
                <p>No se encontraron ingresos para el período seleccionado.</p>
            </div>
        @else
            <!-- Tabla de Ingresos Diarios -->
            <table>
                <thead>
                    <tr>
                        <th>Día</th>
                        <th>Servicios</th>
                        <th>Ingresos</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ingresosDiarios as $ingreso)
                        <tr>
                            <td>
                                {{ ucfirst(\Carbon\Carbon::createFromFormat('Y-m-d', $ingreso->fecha)->locale('es')->dayName) }}
                                {{ \Carbon\Carbon::createFromFormat('Y-m-d', $ingreso->fecha)->format('d') }}
                            </td>
                            <td>{{ $ingreso->cantidad_servicios }}</td>
                            <td>{{ $ajuste->divisa ?? '$' }} {{ number_format($ingreso->total_dia, 2) }}</td>
                            <td>
                                @if($ingreso->total_dia == $mejorDia)
                                    <span class="status-badge status-mejor">Mejor Ingreso</span>
                                @else
                                    <span class="status-badge status-peor">Ingreso Regular</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    
                    <!-- Fila de Total -->
                    <tr class="total-row">
                        <td colspan="2" style="text-align: right;">TOTAL INGRESADO:</td>
                        <td>{{ $ajuste->divisa ?? '$' }} {{ number_format($totalMes, 2) }}</td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        @endif

        <!-- Footer -->
        <div class="footer">
            <div class="footer-item">
                <strong>&copy; {{ now()->year }}</strong> {{ $ajuste->nombre ?? 'ParkCore' }}
            </div>
            <div class="footer-item">
                <strong>Generado por:</strong> {{ $usuario }}
            </div>
        </div>
    </div>
</body>
</html>
