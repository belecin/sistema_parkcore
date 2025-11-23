@extends('adminlte::page')


@section('content_header')

<div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Lista de Tarifas</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Inicio</a></li>
                    <li class="breadcrumb-item active">Tarifas</li>
            </ol>
        </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->


@stop

@section('content')
    @section('content')
@section('content')
    <div class="row">
        <!-- Tarifas por Hora -->
        <div class="col-md-6">
            <div class="card card-outline card-secondary">
                <div class="card-header">
                    <h3 class="card-title"><b>Tarifas registradas por Hora</b></h3>
                    <div class="card-tools">
                        <a href="{{ url('admin/tarifas/create') }}" class="btn btn-secondary"><i class="fas fa-plus"></i> Crear nuevo</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="table1" class="table table-bordered table-hover table-sm">
                            <thead class="bg-secondary">
                                <tr>
                                    <th style="width: 10px">Nro</th>
                                    <th>Nombre</th>
                                    <th>Cantidad</th>
                                    <th>Tipo</th>
                                    <th>Costo</th>
                                    <th>Minutos de gracia</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $conta = 1; @endphp
                                @foreach ($tarifas as $tarifa)
                                    @if ($tarifa->tipo == "hora")
                                        <tr>
                                            <td style="text-align:center">{{ $conta++ }}</td>
                                            <td>{{ $tarifa->nombre }}</td>
                                            <td style="text-align: center">{{ $tarifa->cantidad }}</td>
                                            <td>{{ $tarifa->tipo }}</td>
                                            <td>{{ $ajuste->divisa." ".$tarifa->costo }}</td>
                                            <td style="text-align: center">{{ $tarifa->minutos_de_gracia }} min</td>
                                            <td class="d-flex justify-content-center">
                                                <a href="{{ url('admin/tarifa/'.$tarifa->id.'/edit') }}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i> Editar</a>
                                                <form action="{{ url('admin/tarifa/' .$tarifa->id) }}" method="post" id="miFormulario{{ $tarifa->id }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="preguntar{{ $tarifa->id }}(event)">
                                                        <i class="fas fa-trash-alt"></i> Eliminar
                                                    </button>
                                                </form>
                                                <script>
                                                    function preguntar{{ $tarifa->id }}(evento) {
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
                                                                document.getElementById('miFormulario{{ $tarifa->id }}').submit();
                                                            }
                                                        });
                                                    }
                                                </script>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tarifas por Día -->
        <div class="col-md-6">
            <div class="card card-outline card-secondary">
                <div class="card-header">
                    <h3 class="card-title"><b>Tarifas registradas por Día</b></h3>
                    <div class="card-tools">
                        <a href="{{ url('admin/tarifas/create') }}" class="btn btn-secondary"><i class="fas fa-plus"></i> Crear nuevo</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="table2" class="table table-bordered table-hover table-sm">
                            <thead class="bg-secondary">
                                <tr>
                                    <th style="width: 10px">Nro</th>
                                    <th>Nombre</th>
                                    <th>Cantidad</th>
                                    <th>Tipo</th>
                                    <th>Costo</th>
                                    <th>Minutos de gracia</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $contador = 1; @endphp
                                @foreach ($tarifas as $tarifa)
                                    @if ($tarifa->tipo == "dia")
                                        <tr>
                                            <td style="text-align:center">{{ $contador++ }}</td>
                                            <td>{{ $tarifa->nombre }}</td>
                                            <td style="text-align: center">{{ $tarifa->cantidad }}</td>
                                            <td>{{ $tarifa->tipo }}</td>
                                            <td>{{ $ajuste->divisa." ".$tarifa->costo }}</td>
                                            <td style="text-align: center">{{ $tarifa->minutos_de_gracia }} min</td>
                                            <td class="d-flex justify-content-center">
                                                <a href="{{ url('admin/tarifa/'.$tarifa->id.'/edit') }}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i> Editar</a>
                                                <form action="{{ url('admin/tarifa/' .$tarifa->id) }}" method="post" id="miFormulario{{ $tarifa->id }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="preguntar{{ $tarifa->id }}(event)">
                                                        <i class="fas fa-trash-alt"></i> Eliminar
                                                    </button>
                                                </form>
                                                <script>
                                                    function preguntar{{ $tarifa->id }}(evento) {
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
                                                                document.getElementById('miFormulario{{ $tarifa->id }}').submit();
                                                            }
                                                        });
                                                    }
                                                </script>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- 🔹 NUEVO: Tarifas por Noche (abajo, ocupando todo el ancho) -->
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card card-outline card-secondary">
                <div class="card-header">
                    <h3 class="card-title"><b>Tarifas registradas por Noche</b></h3>
                    <div class="card-tools">
                        <a href="{{ url('admin/tarifas/create') }}" class="btn btn-secondary"><i class="fas fa-plus"></i> Crear nuevo</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="table3" class="table table-bordered table-hover table-sm">
                            <thead class="bg-secondary">
                                <tr>
                                    <th style="width: 10px">Nro</th>
                                    <th>Nombre</th>
                                    <th>Cantidad</th>
                                    <th>Tipo</th>
                                    <th>Costo</th>
                                    <th>Minutos de gracia</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $contadorNoche = 1; @endphp
                                @foreach ($tarifas as $tarifa)
                                    @if ($tarifa->tipo == "noche")
                                        <tr>
                                            <td style="text-align:center">{{ $contadorNoche++ }}</td>
                                            <td>{{ $tarifa->nombre }}</td>
                                            <td style="text-align: center">{{ $tarifa->cantidad }}</td>
                                            <td>{{ $tarifa->tipo }}</td>
                                            <td>{{ $ajuste->divisa." ".$tarifa->costo }}</td>
                                            <td style="text-align: center">{{ $tarifa->minutos_de_gracia }} min</td>
                                            <td class="d-flex justify-content-center">
                                                <a href="{{ url('admin/tarifa/'.$tarifa->id.'/edit') }}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i> Editar</a>
                                                <form action="{{ url('admin/tarifa/' .$tarifa->id) }}" method="post" id="miFormulario{{ $tarifa->id }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="preguntar{{ $tarifa->id }}(event)">
                                                        <i class="fas fa-trash-alt"></i> Eliminar
                                                    </button>
                                                </form>
                                                <script>
                                                    function preguntar{{ $tarifa->id }}(evento) {
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
                                                                document.getElementById('miFormulario{{ $tarifa->id }}').submit();
                                                            }
                                                        });
                                                    }
                                                </script>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
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

        /* Fondo transparente y sin borde en el contenedor */
        #table2_wrapper .dt-buttons {
            background-color: transparent;
            box-shadow: none;
            border: none;
            display: flex;
            justify-content: center; /* Centrar los botones */
            gap: 10px;  /* Espaciado */
            margin-bottom: 15px; /* Separar botones */
        }

        /* Estilo personalizado para los botones */
        #table2_wrapper .btn {
            color: #fff;  /* Color del texto en blanco */
            border-radius: 4px; /* Bordes redondeados */
            padding: 5px 15px; /* Espaciado interno */
            font-size: 14px; /* Tamaño de fuente */
        }

        /* Fondo transparente y sin borde en el contenedor */
        #table3_wrapper .dt-buttons {
            background-color: transparent;
            box-shadow: none;
            border: none;
            display: flex;
            justify-content: center; /* Centrar los botones */
            gap: 10px;  /* Espaciado */
            margin-bottom: 15px; /* Separar botones */
        }

        /* Estilo personalizado para los botones */
        #table3_wrapper .btn {
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
            "pageLength": 5,
            "language": {
            "emptyTable":"No hay información",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ Tarifas",
            "infoEmpty": "Mostrando 0 a 0 de 0 Tarifas",
            "infoFiltered": "(Filtrado de _MAX_ total Tarifas)",
            "lengthMenu": "Mostrar _MENU_ Tarifas",
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
    
    $(function () {
    $("#table2").DataTable({
            "pageLength": 5,
            "language": {
            "emptyTable":"No hay información",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ Tarifas",
            "infoEmpty": "Mostrando 0 a 0 de 0 Tarifas",
            "infoFiltered": "(Filtrado de _MAX_ total Tarifas)",
            "lengthMenu": "Mostrar _MENU_ Tarifas",
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
        }).buttons().container().appendTo('#table2_wrapper .row:eq(0)');
    });

    $(function () {
    $("#table3").DataTable({
        "pageLength": 5,
        "language": {
            "emptyTable":"No hay información",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ Tarifas",
            "infoEmpty": "Mostrando 0 a 0 de 0 Tarifas",
            "infoFiltered": "(Filtrado de _MAX_ total Tarifas)",
            "lengthMenu": "Mostrar _MENU_ Tarifas",
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
    }).buttons().container().appendTo('#table3_wrapper .row:eq(0)');
});
</script>
@stop
