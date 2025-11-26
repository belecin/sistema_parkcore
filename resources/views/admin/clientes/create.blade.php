@extends('adminlte::page')


@section('content_header')

<div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Registro de un nuevo cliente</h1>
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
            <div class="card card-secondary">
                <div class="card-header">
                <h3 class="card-title"><b>Llene el formulario</b></h3>              
            </div>
            <!-- /.card-header -->
            <div class="card-body">      
                <form action="{{ url('/admin/clientes/create') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nombres">Nombre Completo</label><b> (*)</b>
                                <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" class="form-control" name="nombres" id="nombres"
                                    value="{{ old('nombres') }}" 
                                    placeholder="Nombre completo del cliente" required>
                            </div>
                                @error('nombres')
                                    <small style="color: red">{{ $message }}</small>                           
                                @enderror
                            </div>    
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nro_documento">Numero de Documento</label><b> (*)</b>
                                <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                </div>
                                <input type="text" class="form-control" name="nro_documento" id="nro_documento"
                                    value="{{ old('nro_documento') }}" 
                                    placeholder="Numero de documento" required>
                            </div>
                                @error('nro_documento')
                                    <small style="color: red">{{ $message }}</small>                           
                                @enderror
                            </div>    
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="email">Correo Electronico</label><b> (*)</b>
                                <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                </div>
                                <input type="email" class="form-control" name="email" id="email"
                                    value="{{ old('email','cliente@gmail.com') }}" 
                                    placeholder="cliente@gmail.com" required>
                            </div>
                                @error('email')
                                    <small style="color: red">{{ $message }}</small>                           
                                @enderror
                            </div>    
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="celular">Celular</label><b> (*)</b>
                                <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-mobile-alt"></i></span>
                                </div>
                                <input type="text" class="form-control" name="celular" id="celular"
                                    value="{{ old('celular') }}" 
                                    placeholder="958153247" required>
                            </div>
                                @error('celular')
                                    <small style="color: red">{{ $message }}</small>                           
                                @enderror
                            </div>    
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="genero">Género</label><b> (*)</b>
                                <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-venus-mars"></i></span>
                                </div>
                                <select class="form-control" name="genero" id="genero" required>
                                    <option value="">Seleccione...</option>
                                    <option value="Masculino" {{ old('genero') == 'Masculino' ? 'selected' : '' }}> Masculino</option>
                                    <option value="Femenino" {{ old('genero') == 'Femenino' ? 'selected' : '' }}> Femenino</option>
                                </select>                                
                            </div>
                                @error('email')
                                    <small style="color: red">{{ $message }}</small>                           
                                @enderror
                            </div>                           
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <a href="{{ url('/admin/clientes') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Regresar</a>
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
