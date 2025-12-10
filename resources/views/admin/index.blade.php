@extends('adminlte::page')


@section('content_header')
    <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0"><h1><b>Bienvenido(a): </b> {{ Auth::user()->name }} </h1></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href=""><b class="text-secondary">Rol: {{ Auth::user()->roles->pluck('name')->implode(', ') }}</b></a></li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->

    <hr>
    
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9">
                <div class="row">

                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box zoomP">
                            <span class="info-box-icon bg-info">
                                <a href="{{ url('/admin/roles') }}">
                                    <img src="{{ url('/images/roles2.gif') }}" width="100%" alt="">
                                </a>
                            </span>

                            <div class="info-box-content">
                                <span class="info-box-text">Roles registrados</span>
                                <span class="info-box-number">{{ $total_roles }} roles</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>

                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box zoomP">
                            <span class="info-box-icon bg-info">
                                <a href="{{ url('/admin/usuarios') }}">
                                    <img src="{{ url('/images/usuario.gif') }}" width="100%" alt="">
                                </a>
                            </span>

                            <div class="info-box-content">
                                <span class="info-box-text">Usuarios registrados</span>
                                <span class="info-box-number">{{ $total_usuarios }} Usuarios</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>

                    <div class="col-md-6 col-sm-6 col-12">
                        <div class="info-box zoomP">
                            <span class="info-box-icon bg-info">
                                <a href="{{ url('/admin/espacios') }}">
                                    <img src="{{ url('/images/aparcamiento.gif') }}" width="100%" alt="">
                                </a>
                            </span>

                            <div class="info-box-content">
                                <span class="info-box-text">{{ $total_espacios}} Espacios registrados</span>
                                <span class="info-box-number">{{ $total_espacios_libres}} libres | {{ $total_espacios_ocupados}} ocupados | 
                                    {{ $total_espacios_mantenimiento}}  mantenimiento</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box zoomP">
                            <span class="info-box-icon bg-info">
                                <a href="{{ url('/admin/tarifas') }}">
                                    <img src="{{ url('/images/tarifa.gif') }}" width="100%" alt="">
                                </a>
                            </span>

                            <div class="info-box-content">
                                <span class="info-box-text">Tarifas registrados</span>
                                <span class="info-box-number">{{ $total_tarifas }} tarifas</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>

                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box zoomP">
                            <span class="info-box-icon bg-info">
                                <a href="{{ url('/admin/clientes') }}">
                                    <img src="{{ url('/images/cliente.gif') }}" width="100%" alt="">
                                </a>
                            </span>

                            <div class="info-box-content">
                                <span class="info-box-text"> Clientes registrados</span>
                                <span class="info-box-number">{{ $total_clientes }} clientes</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box zoomP">
                            <span class="info-box-icon bg-info">
                                <a href="{{ url('/admin/vehiculos') }}">
                                    <img src="{{ url('/images/auto.gif') }}" width="100%" alt="">
                                </a>
                            </span>

                            <div class="info-box-content">
                                <span class="info-box-text"> Vehiculos registrados</span>
                                <span class="info-box-number">{{ $total_vehiculos }} vehiculos</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box zoomP">
                            <span class="info-box-icon bg-info">
                                <a href="{{ url('/admin/tickets') }}">
                                    <img src="{{ url('/images/boleto.gif') }}" width="100%" alt="">
                                </a>
                            </span>

                            <div class="info-box-content">
                                <span class="info-box-text"> Ticket activos</span>
                                <span class="info-box-number">{{ $total_tickets_activos }} tickets</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3 col-6">
                        <!-- small card -->
                        <div class="small-box bg-light">
                            <div class="inner">
                                <h3> {{ $ajuste->divisa." ".$ingreso_hoy }} </h3>

                                <p>Ingresos de Hoy</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-money-bill-wave"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <!-- small card -->
                        <div class="small-box bg-light">
                            <div class="inner">
                                <h3> {{ $ajuste->divisa." ".$ingreso_ayer }} </h3>

                                <p>Ingresos de Ayer</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-money-bill-wave"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <!-- small card -->
                        <div class="small-box bg-light">
                            <div class="inner">
                                <h3> {{ $ajuste->divisa." ".$ingreso_esta_semana }} </h3>

                                <p>Ingresos de esta semana</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-calendar-day"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <!-- small card -->
                        <div class="small-box bg-light">
                            <div class="inner">
                                <h3> {{ $ajuste->divisa." ".$ingreso_semana_anterior }} </h3>

                                <p>Ingresos de la semana anterior</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-calendar-week"></i>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 col-6">
                        <!-- small card -->
                        <div class="small-box bg-light">
                            <div class="inner">
                                <h3> {{ $ajuste->divisa." ".$ingreso_este_mes }} </h3>

                                <p>Ingresos de este mes</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-chart-line"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <!-- small card -->
                        <div class="small-box bg-light">
                            <div class="inner">
                                <h3> {{ $ajuste->divisa." ".$ingreso_mes_anterior }} </h3>

                                <p>Ingresos del mes anterior</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-chart-bar"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-6">
                        <!-- small card -->
                        <div class="small-box bg-secondary">
                            <div class="inner">
                                <h3> {{ $ajuste->divisa." ".$ingreso_total }} </h3>

                                <p>Ingreso total </p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-money-bill"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <h1 id="reloj-hora" class="text-center font-weight-bold"></h1>
                <h5 id="reloj-fecha" class="text-center"></h5>
                <div class="card card-outline card-secondary">
                <div class="card-header">
                <h3 class="card-title"><b>Calendario</b></h3>
    
            </div>
            <!-- /.card-header -->
            <div class="card-body">      
                <div class="row">
                    <div class="col-md-12">
                        <div id="calendar"></div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            </div>
            </div>


            
        </div>
    </div>
@stop

@section('css')
    <style>
        .zoomP {
            transition: transform 0.3s ease; /* Transición suave para el efecto de zoom */
            box-shadow: #c0c0c0 0px 5px 5px 0px;
            border: 1px solid #c0c0c0
        }
        .zoomP:hover {
        transform: scale(1.05); /* Escala el elemento al 105% de su tamaño original al pasar el mouse */
        }

    </style>
@stop

@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const calendar = new VanillaCalendar('#calendar', {
                type: 'default',
                settings: {
                    lang: 'es',
                    visibility: {
                        theme: 'light'
                    }
                },
                locale: {
                    months: [
                        'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
                        'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
                    ],
                    weekday: ['Dom', 'Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb']
                },
                actions: {
                    clickDay(event, self) {
                        console.log('Fecha seleccionada:', self.selectedDates[0]);
                    }
                }
            });

            calendar.HTMLElement.style.width = '100%';
            calendar.HTMLElement.style.maxWidth = '100%';
            calendar.init();
        });
    </script>

    <script>
        function actualizarReloj() {
            const d = new Date();
            const dias = ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'];
            const meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];

            const diaSemana = dias[d.getDay()];
            const dia = d.getDate();
            const mes = meses[d.getMonth()];
            const ano = d.getFullYear();

            let h = d.getHours();
            let m = d.getMinutes();
            let s = d.getSeconds();

            // Convertir a formato de 12 horas y determinar AM/PM
            let meridiano = h >= 12 ? 'PM' : 'AM';
            h = h % 12;
            h = h ? h : 12; // La hora '0' debe ser '12'

            m = m < 10 ? '0' + m : m;
            s = s < 10 ? '0' + s : s;

            document.getElementById('reloj-fecha').innerHTML = `${diaSemana}, ${dia} de ${mes} de ${ano}`;
            document.getElementById('reloj-hora').innerHTML = `${h}:${m}:${s} ${meridiano}`;
        }

        setInterval(actualizarReloj, 1000);
        actualizarReloj();
    </script>
@stop