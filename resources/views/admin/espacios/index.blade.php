@extends('adminlte::page')


@section('content_header')

<div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Lista de Espacios</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Inicio</a></li>
                <li class="breadcrumb-item active">Lista de Espacios</li>
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
                <h3 class="card-title"><b>Espacios registrados</b></h3>
                <!-- /.card-tools -->   
                <div class="card-tools">
                    <a href="{{ url('admin/espacios/create') }}"class="btn btn-secondary"><i class="fas fa-plus"></i> Crear nuevo</a>
            
                </div>          
            </div>
            <!-- /.card-header -->
            <div class="card-body">      
                <div class="row">
                    @foreach ($espacios as $espacio)
                        <div class="col">
                        <h2>{{ $espacio->numero }}</h2>  
                        <button class="btn btn-success">
                            <img src="{{asset('storage/logos/' . $ajuste->logo_auto) }}" style="max-width: 200px; margin-top: 10px;">
                        </button>  
                        <h3>{{ $espacio->estado }}</h3>
                        </div>
                    @endforeach
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
    
@stop

@section('js')
    
</script>
@stop
