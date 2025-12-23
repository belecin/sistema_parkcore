@extends('adminlte::page')

@section('title', 'Centro de Reportes')

@section('content_header')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1>Centro de reportes del sistema</h1>
    </div>
</div>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Reporte Semanal -->
        <div class="col-lg-6 col-md-12 mb-4">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-calendar-week"></i> Reporte semanal
                    </h3>
                </div>
                <form action="{{ route('admin.reportes.semanal') }}" method="GET" target="_blank">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="fecha_inicio_semanal">Fecha inicio</label>
                            <input 
                                type="date" 
                                class="form-control @error('fecha_inicio') is-invalid @enderror" 
                                id="fecha_inicio_semanal" 
                                name="fecha_inicio" 
                                value="{{ $inicioSemana }}"
                                required>
                            @error('fecha_inicio')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="fecha_fin_semanal">Fecha Fin</label>
                            <input 
                                type="date" 
                                class="form-control @error('fecha_fin') is-invalid @enderror" 
                                id="fecha_fin_semanal" 
                                name="fecha_fin" 
                                value="{{ $finSemana }}"
                                required>
                            @error('fecha_fin')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-file-pdf"></i> Generar reporte
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Reporte Mensual -->
        <div class="col-lg-6 col-md-12 mb-4">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-calendar-alt"></i> Reporte mensual
                    </h3>
                </div>
                <form action="{{ route('admin.reportes.mensual') }}" method="GET" target="_blank">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="year_mensual">Año</label>
                            <select class="form-control @error('year') is-invalid @enderror" id="year_mensual" name="year" required>
                                @foreach($anios as $anio)
                                    <option value="{{ $anio }}" {{ $anio == $anioActual ? 'selected' : '' }}>{{ $anio }}</option>
                                @endforeach
                            </select>
                            @error('year')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="mes_mensual">Mes</label>
                            <select class="form-control @error('mes') is-invalid @enderror" id="mes_mensual" name="mes" required>
                                @foreach($meses as $numero => $nombre)
                                    <option value="{{ $numero }}" {{ $numero == $mesActual ? 'selected' : '' }}>{{ $nombre }}</option>
                                @endforeach
                            </select>
                            @error('mes')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-file-pdf"></i> Generar reporte
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Reporte de Ingresos Diarios -->
    <div class="row">
        <div class="col-lg-6 col-md-12">
            <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-chart-bar"></i> Ingresos diarios
                    </h3>
                </div>
                <form action="{{ route('admin.reportes.ingresosdiarios') }}" method="GET" target="_blank">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="year_diario">Año</label>
                            <select class="form-control @error('year') is-invalid @enderror" id="year_diario" name="year" required>
                                @foreach($anios as $anio)
                                    <option value="{{ $anio }}" {{ $anio == $anioActual ? 'selected' : '' }}>{{ $anio }}</option>
                                @endforeach
                            </select>
                            @error('year')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="mes_diario">Mes</label>
                            <select class="form-control @error('mes') is-invalid @enderror" id="mes_diario" name="mes" required>
                                @foreach($meses as $numero => $nombre)
                                    <option value="{{ $numero }}" {{ $numero == $mesActual ? 'selected' : '' }}>{{ $nombre }}</option>
                                @endforeach
                            </select>
                            @error('mes')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-warning">
                            <i class="fas fa-file-pdf"></i> Generar reporte
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
