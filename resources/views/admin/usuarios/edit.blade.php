@extends('adminlte::page')


@section('content_header')

<div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Modificar datos del usuario: {{ $usuario->name }} </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Inicio</a></li>
                <li class="breadcrumb-item"><a href="{{ url('/admin/usuarios') }}">Listado de usuarios</a></li>
                <li class="breadcrumb-item active"><a href="">Modificar datos</a></li>

            </ol>
        </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->


@stop

@section('content')

<form action="{{ url('/admin/usuario/'.$usuario->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-info">
                <div class="card-header">
                <h3 class="card-title"><b>Llene el formulario</b></h3>              
            </div>
            <!-- /.card-header -->
            <div class="card-body">      
                
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Roles</label><b> (*)</b>
                                <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user-check"></i></span>
                                </div>
                                <select name="rol" class="form-control" id="">
                                    <option value="">Seleccione un rol</option>
                                    @foreach ($roles as $role)
                                        @if (!($role->name == 'SUPER ADMIN'))
                                            <option value="{{ $role->name }}"
                                                {{ old('rol', $usuario->Roles->pluck('name')->implode(', ')) == $role->name ? 'selected' : '' }}>
                                                {{ $role->name }}</option>                                      
                                    @endif
                                        
                                    @endforeach
                                </select>
                            </div>
                                @error('rol')
                                    <small style="color: red">{{ $message }}</small>                           
                                @enderror
                            </div>    
                        </div>
                    <div class="col-md-3">
                            <div class="form-group">
                                <label for="nombres">Nombres</label><b> (*)</b>
                                <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" class="form-control" name="nombres" id="nombres"
                                    value="{{ old('nombres', $usuario->nombres) }}" placeholder="Nombres" required>
                            </div>
                                @error('nombres')
                                    <small style="color: red">{{ $message }}</small>                           
                                @enderror
                            </div>    
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="apellidos">Apellidos</label><b> (*)</b>
                                <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" class="form-control" name="apellidos" id="apellidos"
                                    value="{{ old('apellidos',$usuario->apellidos) }}" placeholder="Apellidos" required>
                            </div>
                                @error('apellidos')
                                    <small style="color: red">{{ $message }}</small>                           
                                @enderror
                            </div>    
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="email">Correo Electronico</label><b> (*)</b>
                                <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                </div>
                                <input type="text" class="form-control" name="email" id="email"
                                    value="{{ old('email',$usuario->email) }}" placeholder="Correo Electronico" required>
                            </div>
                                @error('email')
                                    <small style="color: red">{{ $message }}</small>                           
                                @enderror
                            </div>    
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="tipo_documento">Tipo de Documento</label><b> (*)</b>
                                <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                </div>
                                <select class="form-control" name="tipo_documento" id="tipo_documento" required>
                                    <option value="">Seleccione...</option>
                                    <option value="DNI" {{ old('tipo_documento',$usuario->tipo_documento) == 'DNI' ? 'selected' : '' }}> DNI</option>
                                    <option value="Carnet de Extranjeria" {{ old('tipo_documento',$usuario->tipo_documento) == 'Carnet de Extranjeria' ? 'selected' : '' }}> 
                                        Carnet de Extranjeria</option>
                                    <option value="Pasaporte" {{ old('tipo_documento',$usuario->tipo_documento) == 'Pasaporte' ? 'selected' : '' }}> Pasaporte</option>
                                    <option value="RUC" {{ old('tipo_documento',$usuario->tipo_documento) == 'RUC' ? 'selected' : '' }}> RUC</option>   
                                </select>                                
                            </div>
                                @error('email')
                                    <small style="color: red">{{ $message }}</small>                           
                                @enderror
                            </div>                           
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="nro_documento">Nro de documento</label><b> (*)</b>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                    </div>
                                <input type="text" class="form-control" name="nro_documento" id="nro_documento"
                                    value="{{ old('nro_documento',$usuario->nro_documento) }}" placeholder="Nro de documento" required>
                            </div>
                                @error('nro_documento')
                                    <small style="color: red">{{ $message }}</small>                           
                                @enderror
                            </div>    
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="celular">Celular</label><b> (*)</b>
                                <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-mobile-alt"></i></span>
                                </div>
                                <input type="text" class="form-control" name="celular" id="celular"
                                    value="{{ old('celular',$usuario->celular) }}" placeholder="Celular" required>
                            </div>
                                @error('celular')
                                    <small style="color: red">{{ $message }}</small>                           
                                @enderror
                            </div>    
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="fecha_nacimiento">Fecha de Nacimiento</label><b> (*)</b>
                                <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                </div>
                                <input type="date" class="form-control" name="fecha_nacimiento" id="fecha_nacimiento"
                                    value="{{ old('fecha_nacimiento',$usuario->fecha_nacimiento) }}" required>
                            </div>
                                @error('fecha_nacimiento')
                                    <small style="color: red">{{ $message }}</small>                           
                                @enderror
                            </div>    
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="genero">Género</label><b> (*)</b>
                                <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-venus-mars"></i></span>
                                </div>
                                <select class="form-control" name="genero" id="genero" required>
                                    <option value="">Seleccione...</option>
                                    <option value="Masculino" {{ old('genero',$usuario->genero) == 'Masculino' ? 'selected' : '' }}> Masculino</option>
                                    <option value="Femenino" {{ old('genero',$usuario->genero) == 'Femenino' ? 'selected' : '' }}> Femenino</option>
                                </select>                                
                            </div>
                                @error('email')
                                    <small style="color: red">{{ $message }}</small>                           
                                @enderror
                            </div>                           
                        </div>
                        <div class="col-md-9">
                                <div class="form-group">
                                    <label for="direccion">Dirección</label><b> (*)</b>
                                    <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="direccion" id="direccion"
                                        value="{{ old('direccion',$usuario->direccion) }}" placeholder="Dirección" required>
                                </div>
                                    @error('direccion')
                                        <small style="color: red">{{ $message }}</small>                           
                                    @enderror
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
            <div class="card card-secondary">
                <div class="card-header">
                <h3 class="card-title"><b>Contactos de Emergencia</b></h3>              
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                                <div class="form-group">
                                    <label for="contacto_nombre">Nombre contacto de Emergencia</label><b> (*)</b>
                                    <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user-shield"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="contacto_nombre" id="contacto_nombre"
                                        value="{{ old('contacto_nombre',$usuario->contacto_nombre) }}" placeholder="Nombre contacto de Emergencia" required>
                                </div>
                                    @error('contacto_nombre')
                                        <small style="color: red">{{ $message }}</small>                           
                                    @enderror
                                </div>    
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="contacto_telefono">Teléfono del contacto de Emergencia</label><b> (*)</b>
                                    <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user-shield"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="contacto_telefono" id="contacto_telefono"
                                        value="{{ old('contacto_telefono',$usuario->contacto_telefono) }}" placeholder="Teléfono del contacto de Emergencia" required>
                                </div>
                                    @error('contacto_telefono')
                                        <small style="color: red">{{ $message }}</small>                           
                                    @enderror
                                </div>    
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="contacto_parentesco">Parentesco del contacto de Emergencia</label><b> (*)</b>
                                    <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user-friends"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="contacto_parentesco" id="contacto_parentesco"
                                        value="{{ old('contacto_parentesco',$usuario->contacto_parentesco) }}" placeholder="Parentesco del contacto de Emergencia" required>
                                </div>
                                    @error('contacto_parentesco')
                                        <small style="color: red">{{ $message }}</small>                           
                                    @enderror
                                </div>    
                            </div>
                        </div>   
                
            </div>
            <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>

    <hr>
    <div class="row">
        <div class="col-md-12">
            <a href="{{ url('/admin/usuarios') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Regresar</a>
        <button type="submit" class="btn btn-info"><i class="fas fa-save"></i> Actualizar</button>
        </div>
    </div>
</form>

@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop

