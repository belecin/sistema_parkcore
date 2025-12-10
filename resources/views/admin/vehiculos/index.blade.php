@extends('adminlte::page')


@section('content_header')

<div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Lista de vehiculos</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Inicio</a></li>
                    <li class="breadcrumb-item active">Listado de vehiculos</li>
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
                <h3 class="card-title"><b> Vehiculos registrados</b></h3>          
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
                                    <th>Cliente</th>
                                    <th>Tipo</th>
                                    <th>Placa</th>
                                    <th>Marca</th>
                                    <th>Modelo</th>
                                    <th>Color</th>      
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($vehiculos as $vehiculo)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $vehiculo->cliente->nombres }}</td>
                                    <td>{{ $vehiculo->tipo }}</td>
                                    <td>{{ $vehiculo->placa }}</td>
                                    <td>{{ $vehiculo->marca }}</td>
                                    <td>{{ $vehiculo->modelo }}</td>
                                    <td>{{ $vehiculo->color }}</td>
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
            "info": "Mostrando _START_ a _END_ de _TOTAL_ Vehiculos",
            "infoEmpty": "Mostrando 0 a 0 de 0 Vehiculos",
            "infoFiltered": "(Filtrado de _MAX_ total Vehiculos)",
            "lengthMenu": "Mostrar _MENU_ Vehiculos",
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
