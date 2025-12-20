@extends('adminlte::page')


@section('content_header')

<div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Lista de facturas</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Inicio</a></li>
                    <li class="breadcrumb-item active">Facturas realizadas</li>
            </ol>
        </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->


@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-secondary">
                <div class="card-header">
                    <h3 class="card-title"><b>Facturas registrados</b></h3>
                </div>          
            </div>
            <!-- /.card-header -->
            <div class="card-body">      
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                        <table id="table1" class="table table-bordered table-hover table-sm" >
                            <thead class="bg-secondary">
                                <tr>
                                    <th style="width: 10px">Nro</th>
                                    <th>Numero de la Factura</th>
                                    <th>Cliente</th>
                                    <th>Documento</th>
                                    <th>Placa</th>
                                    <th>Detalle</th>
                                    <th>Monto</th>
                                    <th>Fecha y hora de registrado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $contador = 1;
                                @endphp
                                @foreach ($facturas as $factura)
                                
                                    <tr>
                                    <td>{{ $contador++ }}</td>
                                    <td>{{ $factura->nro_factura }}</td>
                                    <td>{{ $factura->nombre_cliente}}</td>
                                    <td>{{ $factura->nro_documento }}</td>
                                    <td>{{ $factura->placa }}</td>
                                    <td>{{ $factura->detalle }}</td>
                                    <td>{{ $ajuste->divisa." ".$factura->monto }}</td>
                                    <td>{{ $factura->created_at }}</td>
                                    <td class="d-flex justify-center">
                                        <a href="{{ url('/admin/factura/' . $factura->id) }}"
                                            class="btn btn-warning btn-sm"><i class="fas fa-print"></i> Reimprimir</a>
                                    
                                    </td>
                                </tr>
                                    
                                @endforeach
                            </tbody>    
                        </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@stop

@section('css')
    <style>
        /* Fondo transparente y sin borde en el contenedor */
        #table1_wrapper .dt-buttons {
            background-color: transparent;
            box-shadow: none;
            border: none;
            display: flex;
            justify-content: center; /* Centrar los botones */
            gap: 10px;  /* Espaciado */
            margin-bottom: 15px; /* Separar botones */
        }

        /* Estilo personalizado para los botones */
        #table1_wrapper .btn {
            color: #fff;  /* Color del texto en blanco */
            border-radius: 4px; /* Bordes redondeados */
            padding: 5px 15px; /* Espaciado interno */
            font-size: 14px; /* Tamaño de fuente */
        }

        /* Colores por tipo de botón */
        .btn-danger { background-color: #dc3545;border: none; }
        .btn-success {background-color: #28a745;border: none;}
        .btn-info {background-color: #17a2b8;border: none;}
        .btn-warning {background-color: #ffc107; color: #212529;border: none;}
        .btn-default {background-color: #6e7176;olor: #212529;border: none;}
    </style>
@stop

@section('js')
    <script> 
        $(function () {
            $("#table1").DataTable({
            "pageLength": 6,
            "language": {
            "emptyTable":"No hay información",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ Facturas",
            "infoEmpty": "Mostrando 0 a 0 de 0 Facturas",
            "infoFiltered": "(Filtrado de _MAX_ total Facturas)",
            "lengthMenu": "Mostrar _MENU_ Facturas",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "search": "Buscar:",
            "zeroRecords": "Sin resultados encontrados",
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            }
        },
        "responsive": true,
        "lengthChange": true,
        "autoWidth": false,
        "buttons": [
            { text: '<i class="fas fa-copy"></i> COPIAR', extend: 'copy', className:'btn btn-secondary' },
            { text: '<i class="fas fa-file-pdf"></i> PDF', extend: 'pdf', className:'btn btn-danger' },
            { text: '<i class="fas fa-file-excel"></i> EXCEL', extend: 'excel', className:'btn btn-success' },
            { text: '<i class="fas fa-file-csv"></i> CSV', extend: 'csv', className:'btn btn-info' },
            { text: '<i class="fas fa-print"></i> IMPRIMIR', extend: 'print', className:'btn btn-warning' }
        ]
        }).buttons().container().appendTo('#table1_wrapper .row:eq(0)');
    });  
</script>
@stop
