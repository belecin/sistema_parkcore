@extends('adminlte::page')


@section('content_header')

<div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0"><b>Cliente:</b> {{ $cliente->nombres }} </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Inicio</a></li>
                <li class="breadcrumb-item"><a href="{{ url('/admin/clientes') }}">Listado de clientes</a></li>
            </ol>
        </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->


@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-info">
                <div class="card-header">
                <h3 class="card-title"><b>Datos registrados del cliente</b></h3>              
            </div>
            <!-- /.card-header -->
            <div class="card-body">      
                
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="nombres"><i class="fas fa-user"></i> Nombre Completo</label>
                                <p>{{ $cliente->nombres}}</p>
                            </div>    
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="nro_documento"><i class="fas fa-id-card"></i> Numero de Documento</label>
                                <p>{{ $cliente->nro_documento}}</p>
                            </div>    
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="email"><i class="fas fa-envelope"></i> Correo Electronico</label>
                                <p>{{ $cliente->email}}</p>
                            </div>    
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="celular"><i class="fas fa-mobile-alt"></i> Celular</label>
                                <p>{{ $cliente->celular}}</p>
                            </div>    
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="genero"><i class="fas fa-venus-mars"></i> Género</label>
                                <p>{{ $cliente->genero}}</p>
                            </div>                           
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="genero"> Estado</label><br>
                        @if ($cliente->estado == 1)
                                <span class="badge badge-success" >Activo</span>                               
                        @else
                                <span class="badge badge-danger" >Inactivo</span>
                        @endif 
                    </div>
                    </div>
            </div>
            </div>
            <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-info">
                <div class="card-header">
                <h3 class="card-title"><b>Listado de vehiculos</b></h3>     
                <div class="card-tools">
                    <a href="{{ url('admin/clientes/vehiculos') }}"class="btn btn-info btn-sm "><i class="fas fa-plus"></i> Crear nuevo</a>
                </div>             
            </div>
            <!-- /.card-header -->
            <div class="card-body">      
                <div class="table-responsive">
                        <table id="table1" class="table table-bordered table-hover table-sm" >
                            <thead class="bg-light">
                                <tr>
                                    <th style="width: 10px">Nro</th>
                                    <th>Placa</th>
                                    <th>Marca</th>
                                    <th>Modelo</th>
                                    <th>Color</th>
                                    <th>Tipo</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cliente->vehiculos as $vehiculos)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $vehiculo->placa }}</td>
                                    <td>{{ $vehiculo->marca }}</td>
                                    <td>{{ $vehiculo->modelo }}</td>
                                    <td>{{ $vehiculo->color }}</td>
                                    <td>{{ $vehiculo->tipo }}</td>
                                    <td class="d-flex justify-center">
                                        <a href="{{ url('admin/cliente/vehiculo/'.$vehiculo->id.'/edit') }}" class="btn btn-success btn-sm"><i class="fas fa-edit"></i> Editar</a>
                                        <form action="{{ url('admin/cliente/vehiculo/' .$vehiculo->id) }}" method="post" id="miFormulario{{ $vehiculo->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="preguntar{{ $vehiculo->id }} (event)">
                                            <i class="fas fa-trash-alt"></i> Eliminar
                                        </button>
                                        </form>
                                        <script>
                                            function preguntar{{ $vehiculo->id }} (evento) {
                                                evento.preventDefault();

                                                Swal.fire({
                                                    title: '¿Estás seguro que desea eliminar?',
                                                    text: '',
                                                    icon: 'question',
                                                    showDenyButton: true,
                                                    confirmButtonText: 'Sí, eliminar',
                                                    confirmButtonColor: '#dc3545',
                                                    denyButtonColor: '#6e7176',
                                                    denyButtonText: 'Cancelar',                                                    
                                                }).then((result) => {
                                                    if (result.isConfirmed) {
                                                        document.getElementById('miFormulario{{ $vehiculo->id }}').submit(); //java script para enviar el formulario
                                                    } 
                                                } );
                                            } 
                                        </script>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>    
                        </table>
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
