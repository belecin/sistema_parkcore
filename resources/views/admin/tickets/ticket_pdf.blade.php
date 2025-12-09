<!-- resources/views/admin/creditos/comprobante_termico.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket</title>
    <style>
        body {
            font-family: 'Courier New', Courier, monospace;
            font-size: 12px;
            line-height: 1.2;
            width: 283.46px;
            max-width: 283.46px;
            overflow-x: hidden;
            margin: 0px;
            padding: 0px;
            background-color: #fff;
        }
        .container {
            border: 0px solid #000;
            margin: 0px;
            padding: 0px;
        }
        .header, .footer {
            
        }
        .line {
            border-top: 1px dashed #000;
            margin: 5px 0;
        }

        </style>
    </head>
    <body>
        <div class="container">
            <!-- Encabezado -->
            <div class="header" style="text-align: center">
                <b style="">{{ $ajuste->nombre }}</b><br>
                {{ $ajuste->descripcion }}<br>
                {{ $ajuste->sucursal }}<br>
                {{ $ajuste->direccion }}<br>
                {{ $ajuste->telefonos }}<br>
            </div>

            <div class="line"></div>

            <!-- Título -->
            <h3 style="margin: 5px 0; font-size: 14px; text-align: center">TICKET: {{ $ticket->codigo_ticket }} </h3>

            <!-- Datos del cliente -->
            <div style="text-align: left;">
                <strong>Datos del cliente:</strong><br>
                <b>Señor(a):</b> {{ $ticket->cliente->nombres }}<br>
                <b>Documento:</b> {{ $ticket->cliente->nro_documento }}<br>
                <b>Placa:</b> {{ $ticket->vehiculo->placa }}<br>
                
            </div>

            <div class="line"></div>

            <!-- Datos del pago -->
            <div>
                <b>Espacio nro: </b>{{ $ticket->espacio->numero }} <br>
                <b>Fecha de Ingreso: </b>{{ $ticket->fecha_ingreso }} <br>
                <b>Hora de Ingreso: </b>{{ $ticket->hora_ingreso }} <br>
            </div>

            <div class="line"></div>

            <!-- Firmas -->
            <div class="footer" style="text-align: center">
                <small style="font-size: 6pt">
                    <b>Hora de impresión:</b> {{ $fecha_hora }} <br>
                    <b>Usuario: </b>  {{ $ticket->usuario->name }} <br>
                    <b>¡Gracias por su preferencia!</b>
                    
                </small>
            </div>
        </div>
    </body>
</html>