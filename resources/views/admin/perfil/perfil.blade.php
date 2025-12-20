@extends('adminlte::page')

@section('content_header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Mi Perfil</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Inicio</a></li>
                <li class="breadcrumb-item active">Mi Perfil</li>
            </ol>
        </div>
    </div>
</div>
@stop

@section('content')
<form action="{{ route('perfil.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{ $usuario->id }}">

    <div class="row">
        <div class="col-md-10">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title"><b>Mis datos</b></h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="rol">Rol</label>
                                <select name="rol" class="form-control" id="rol" disabled>
                                    @foreach ($roles as $role)
                                        @if (!($role->name == 'SUPER ADMIN'))
                                            <option value="{{ $role->name }}" {{ $usuario->Roles->pluck('name')->implode(', ') == $role->name ? 'selected' : '' }}>{{ $role->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nombres">Nombres</label>
                                <input type="text" class="form-control" name="nombres" id="nombres" value="{{ old('nombres', $usuario->nombres) }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="apellidos">Apellidos</label>
                                <input type="text" class="form-control" name="apellidos" id="apellidos" value="{{ old('apellidos',$usuario->apellidos) }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="email">Correo Electronico</label>
                                <input type="text" class="form-control" name="email" id="email" value="{{ old('email',$usuario->email) }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="tipo_documento">Tipo de Documento</label>
                                <select class="form-control" name="tipo_documento" id="tipo_documento">
                                    <option value="">Seleccione...</option>
                                    <option value="DNI" {{ old('tipo_documento',$usuario->tipo_documento) == 'DNI' ? 'selected' : '' }}> DNI</option>
                                    <option value="Carnet de Extranjeria" {{ old('tipo_documento',$usuario->tipo_documento) == 'Carnet de Extranjeria' ? 'selected' : '' }}> Carnet de Extranjeria</option>
                                    <option value="Pasaporte" {{ old('tipo_documento',$usuario->tipo_documento) == 'Pasaporte' ? 'selected' : '' }}> Pasaporte</option>
                                    <option value="RUC" {{ old('tipo_documento',$usuario->tipo_documento) == 'RUC' ? 'selected' : '' }}> RUC</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nro_documento">Nro de documento</label>
                                <input type="text" class="form-control" name="nro_documento" id="nro_documento" value="{{ old('nro_documento',$usuario->nro_documento) }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="celular">Celular</label>
                                <input type="text" class="form-control" name="celular" id="celular" value="{{ old('celular',$usuario->celular) }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                                <input type="date" class="form-control" name="fecha_nacimiento" id="fecha_nacimiento" value="{{ old('fecha_nacimiento',$usuario->fecha_nacimiento) }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="genero">Género</label>
                                <select class="form-control" name="genero" id="genero">
                                    <option value="">Seleccione...</option>
                                    <option value="Masculino" {{ old('genero',$usuario->genero) == 'Masculino' ? 'selected' : '' }}> Masculino</option>
                                    <option value="Femenino" {{ old('genero',$usuario->genero) == 'Femenino' ? 'selected' : '' }}> Femenino</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="direccion">Dirección</label>
                                <input type="text" class="form-control" name="direccion" id="direccion" value="{{ old('direccion',$usuario->direccion) }}">
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-md-2">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title"><b>Fotografía</b></h3>
                </div>
                <div class="card-body text-center">
                    @if(isset($usuario->foto) && $usuario->foto != null)
                        <img id="preview" src="{{ asset('storage/'.$usuario->foto) }}" alt="Foto" style="width:200px;height:200px;object-fit:cover;border-radius:4px;">
                    @else
                        <div style="width:200px;height:200px;border:1px dashed #ccc;display:flex;align-items:center;justify-content:center;">Sin foto</div>
                    @endif

                    <div class="form-group mt-3">
                        <input type="file" name="foto" id="foto" accept="image/*" class="form-control-file">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-secondary">
                <div class="card-header">
                    <h3 class="card-title"><b>Contactos de Emergencia</b></h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="contacto_nombre">Nombre contacto de Emergencia</label>
                                <input type="text" class="form-control" name="contacto_nombre" id="contacto_nombre" value="{{ old('contacto_nombre',$usuario->contacto_nombre) }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="contacto_telefono">Teléfono del contacto de Emergencia</label>
                                <input type="text" class="form-control" name="contacto_telefono" id="contacto_telefono" value="{{ old('contacto_telefono',$usuario->contacto_telefono) }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="contacto_parentesco">Parentesco del contacto de Emergencia</label>
                                <input type="text" class="form-control" name="contacto_parentesco" id="contacto_parentesco" value="{{ old('contacto_parentesco',$usuario->contacto_parentesco) }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-danger">
                <div class="card-header">
                    <h3 class="card-title"><b>Seguridad - Cambio de Contraseña</b></h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="password_actual">Contraseña Actual</label>
                                <input type="password" class="form-control" name="password_actual" id="password_actual" placeholder="Contraseña Actual">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="password">Nueva Contraseña</label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="Nueva Contraseña">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="password_confirmation">Confirmación de Contraseña</label>
                                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Confirmación de Contraseña">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <hr>
    <div class="row">
        <div class="col-md-12">
            <a href="{{ url('/admin') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Regresar</a>
            <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Guardar</button>
        </div>
    </div>
</form>
@stop

@section('js')
<script>
    document.getElementById('foto')?.addEventListener('change', function(e){
        const [file] = this.files;
        if(file){
            const preview = document.getElementById('preview');
            const url = URL.createObjectURL(file);
            if(preview){ preview.src = url; }
        }
    });
</script>
@stop
