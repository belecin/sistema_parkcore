@extends('adminlte::page')


@section('content_header')

<div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Registro de una nueva tarifa</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Inicio</a></li>
                <li class="breadcrumb-item"><a href="{{ url('/admin/tarifas') }}">Listado de tarifas</a></li>
            </ol>
        </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->


@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-secondary">
                <div class="card-header">
                <h3 class="card-title"><b>Llene el formulario</b></h3>              
            </div>
            <!-- /.card-header -->
            <div class="card-body">      
                <form action="{{ url('/admin/tarifas/create') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nombre">Nombre de la tarifa</label><b> (*)</b>
                                <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-tag"></i>
                                    </span>
                                </div>
                                    <select class="form-control" name="nombre" id="nombre" required>
                                    <option value="">Seleccione una tarifa</option>    
                                    <option value="regular" {{ old('nombre') == 'regular' ? 'selected' : '' }}> Tarifa Regular</option>
                                    <option value="nocturna" {{ old('nombre') == 'nocturna' ? 'selected' : '' }}> Tarifa nocturna</option>
                                    <option value="fin_de_semana" {{ old('nombre') == 'fin_de_semana' ? 'selected' : '' }}> Fin de semana</option>
                                    <option value="feriados" {{ old('nombre') == 'feriados' ? 'selected' : '' }}> Feriados</option>                                   
                                </select>    
                                </div>
                                @error('nombre')
                                    <small style="color: red">{{ $message }}</small>                           
                                @enderror
                            </div>    
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tipo">Tipo de tarifa</label><b> (*)</b>
                                <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-clock"></i>
                                    </span>
                                </div>
                                <select class="form-control" name="tipo" id="tipo" required>
                                    <option value="">Seleccione un tipo</option>    
                                    <option value="hora" {{ old('tipo') == 'hora' ? 'selected' : '' }}> Por hora</option>
                                    <option value="dia" {{ old('tipo') == 'dia' ? 'selected' : '' }}> Por dia</option>
                                    <option value="noche" {{ old('tipo') == 'noche' ? 'selected' : '' }}> Por noche</option>                                
                                </select>    
                                </div>
                                @error('tipo')
                                    <small style="color: red">{{ $message }}</small>                           
                                @enderror
                            </div>    
                        </div>
                    </div>    
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="cantidad">Cantidad</label><b> (*)</b>
                                <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-layer-group"></i>
                                    </span>
                                </div>
                                <input class="form-control" type="number" name="cantidad" id="cantidad" 
                                    min="0" value="{{ old('cantidad') }}">
                                </div>
                            </div>    
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="costo">Costo</label><b> (*)</b>
                                <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-dollar-sign"></i>
                                    </span>
                                </div>
                                <input class="form-control" type="number" name="costo" id="costo" step="0.01" min="0" required value="{{ old('costo') }}">
                                </div>
                                @error('costo')
                                    <small style="color: red">{{ $message }}</small>                           
                                @enderror
                            </div>    
                        </div>
            
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="minutos_de_gracia">Minutos de Gracia</label><b> (*)</b>
                                <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-hourglass-half"></i>
                                    </span>
                                </div>
                                <input class="form-control" type="number" name="minutos_de_gracia" 
                                id="minutos_de_gracia"  min="0" required 
                                value="{{ old('minutos_de_gracia') }}">
                            </div>
                            @error('minutos_de_gracia')
                                <small style="color: red">{{ $message }}</small>                           
                            @enderror
                            </div>    
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <a href="{{ url('/admin/tarifas') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Regresar</a>
                            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop
