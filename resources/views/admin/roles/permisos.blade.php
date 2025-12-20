@extends('adminlte::page')

@section('content_header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Permisos - {{ $role->name }}</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Inicio</a></li>
                <li class="breadcrumb-item"><a href="{{ url('admin/roles') }}">Roles</a></li>
                <li class="breadcrumb-item active">Permisos</li>
            </ol>
        </div>
    </div>
</div>
@stop

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-outline card-secondary">
            <div class="card-header">
                <h3 class="card-title"><b>Asignar Permisos a: {{ $role->name }}</b></h3>
                @if($role->name === 'SUPER ADMIN')
                    <div class="alert alert-info" style="margin-top: 10px; margin-bottom: 0;">
                        <i class="fas fa-info-circle"></i> El rol SUPER ADMIN tiene todos los permisos asignados automáticamente.
                    </div>
                @endif
            </div>

            <div style="background:#a49906ba;color:#fff;padding:10px 15px;border-top-left-radius:0;border-top-right-radius:0;">
                <strong>Permisos registrados del sistema</strong>
            </div>

            <form action="{{ url('admin/rol/'.$role->id.'/permisos') }}" method="POST">
                @csrf
                <div class="card-body">
                    @if($role->name === 'SUPER ADMIN')
                        <div class="alert alert-warning">
                            <strong>Nota:</strong> No es posible modificar los permisos del rol SUPER ADMIN.
                        </div>
                    @else
                        <div class="row">
                            @foreach($groupedPermissions as $moduleName => $permissions)
                            <div class="col-md-3">
                                <div class="card card-secondary card-outline">
                                    <div class="card-header">
                                        <h5 class="card-title">{{ $moduleName }}</h5>
                                    </div>
                                    <div class="card-body">
                                        @foreach($permissions as $permission)
                                            <div class="custom-control custom-checkbox">
                                                <input 
                                                    type="checkbox" 
                                                    class="custom-control-input" 
                                                    id="permission{{ $permission->id }}"
                                                    name="permisos[]"
                                                    value="{{ $permission->id }}"
                                                    {{ in_array($permission->id, $rolePermissions) ? 'checked' : '' }}
                                                >
                                                <label class="custom-control-label" for="permission{{ $permission->id }}">
                                                    {{ $permission->name }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    @endif
                </div>

                @if($role->name !== 'SUPER ADMIN')
                <div class="card-footer">
                    <button type="submit" class="btn btn-warning">
                        <i class="fas fa-save"></i> Guardar Permisos
                    </button>
                    <a href="{{ url('admin/roles') }}" class="btn btn-secondary">
                        <i class="fas fa-times"></i> Cancelar
                    </a>
                </div>
                @else
                <div class="card-footer">
                    <a href="{{ url('admin/roles') }}" class="btn btn-secondary">
                        <i class="fas fa-times"></i> Volver
                    </a>
                </div>
                @endif
            </form>
        </div>
    </div>
</div>
@stop

@section('css')
<style>
    .custom-control {
        margin-bottom: 0.75rem;
    }
    
    .card-header {
        background-color: #f8f9fa;
        border-bottom: 1px solid #dee2e6;
    }
    
    .card-body {
        padding: 1rem 0.75rem;
    }
</style>
@stop
