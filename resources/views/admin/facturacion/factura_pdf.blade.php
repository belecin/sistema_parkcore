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
        table{
            width: 100%;
            border-collapse: collapse;
            margin: 5px 0;
        }
        th, td {
            border: 1px solid #000;
            padding: 3px;
            font-size: 10px;
        }

        </style>
    </head>
    <body>
        <div class="container">
            <!-- Encabezado -->
            <div class="header" style="text-align: center">
                <b style="">{{ $ajuste->nombre }}</b><br>
                {{ $ajuste->descripcion }}<br>
                Sucursal: {{ $ajuste->sucursal }}<br>
                {{ $ajuste->direccion }}<br>
                {{ $ajuste->telefonos }}<br>
            </div>

            <div class="line"></div>

            <!-- Título -->
            <h3 style="margin: 5px 0; font-size: 14px; text-align: center">FACTURA: {{ $factura->nro_factura }} </h3>

            <!-- Datos del cliente -->
            <div style="text-align: left;">
                <strong>DATOS DEL CLIENTE:</strong><br>
                <b>Señor(a):</b> {{ $factura->nombre_cliente }}<br>
                <b>Documento:</b> {{ $factura->nro_documento }}<br>
                <b>Placa del vehiculo:</b> {{ $factura->placa }}<br>
                
            </div>

            <div class="line"></div>

            <!-- Datos del pago -->
            <div>
                <strong>DATOS DEL SERVICIO:</strong><br>
                <b>Espacio nro: </b>{{ $factura->ticket->espacio->numero }} <br>
                <b>Fecha de Ingreso: </b>{{ $factura->ticket->fecha_ingreso }} <br>
                <b>Hora de Ingreso: </b>{{ $factura->ticket->hora_ingreso }} <br>
                <b>Fecha de salida: </b>{{ $factura->ticket->fecha_salida }} <br>
                <b>Hora de salida: </b>{{ $factura->ticket->hora_salida }} <br>
            </div>

            <div class="line"></div>

            <div>
                <table>
                    <thead>
                        <th>Detalle</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="width: 150px"> {{$factura->detalle}} </td>
                            <td style="text-align: center">1</td>
                            <td> {{ $ajuste->divisa." ".$factura->monto }} </td>
                        </tr>
                    </tbody>
                </table>
                <p style="text-align: right"><b>Monto Total:</b>{{ $ajuste->divisa." ".$factura->monto }}</p>
            </div>
            <div class="line"></div> 

            <!-- Firmas -->
            <div class="footer" style="text-align: center">
                <small style="font-size: 6pt">
                    <b>Hora de impresión:</b> {{ $fecha_hora }} <br>
                    <b>Usuario: </b>  {{ $factura->usuario->name }} <br>
                    <b>¡Gracias por su preferencia!</b>
                    
                </small>
            </div>
        </div>
    </body>
</html>