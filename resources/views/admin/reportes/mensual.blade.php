<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Reporte Mensual</title>
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
            color: #496045;
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
            color: #496045;
            font-weight: bold;
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
            background-color: #496045;
            color: white;
        }
        
        table th {
            padding: 12px;
            text-align: left;
            font-size: 12px;
            font-weight: bold;
            border: 1px solid #496045;
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
        
        .total-row {
            font-weight: bold;
            background-color: #e8f5e9;
            color: #496045;
        }
        
        .total-row td {
            border: 2px solid #496045;
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
            <h1>REPORTE MENSUAL</h1>
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

        <!-- Contenido -->
        @if($facturaciones->isEmpty())
            <div class="no-data">
                <p>No se encontraron facturaciones para el período seleccionado.</p>
            </div>
        @else
            <!-- Tabla de Facturaciones -->
            <table>
                <thead>
                    <tr>
                        <th>Cliente</th>
                        <th>Vehículo (Placa)</th>
                        <th>Detalle/Servicio</th>
                        <th>Monto</th>
                        <th>Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($facturaciones as $factura)
                        <tr>
                            <td>{{ $factura->nombre_cliente }}</td>
                            <td>{{ $factura->placa ?? 'N/A' }}</td>
                            <td>{{ $factura->detalle }}</td>
                            <td>{{ $ajuste->divisa ?? '$' }} {{ number_format($factura->monto, 2) }}</td>
                            <td>{{ \Carbon\Carbon::parse($factura->created_at)->format('d/m/Y H:i') }}</td>
                        </tr>
                    @endforeach
                    
                    <!-- Fila de Total -->
                    <tr class="total-row">
                        <td colspan="3" style="text-align: right;">TOTAL:</td>
                        <td>{{ $ajuste->divisa ?? '$' }} {{ number_format($total, 2) }}</td>
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
