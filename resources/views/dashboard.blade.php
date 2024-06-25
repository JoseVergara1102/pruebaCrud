@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="text-center font-bold"><strong>PANEL PRINCIPAL</strong></h1>
@stop

@section('content')

    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $totalRecursos }}</h3>
                    <p>Total de Recursos</p>
                </div>
                <div class="icon">
                    <i class="fas fa-database"></i>
                </div>
                <a href="{{ route('recursos.index') }}" class="small-box-footer">Más info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $totalPersonas }}</h3>
                    <p>Total de Personas</p>
                </div>
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
                <a href="{{ route('personas.index') }}" class="small-box-footer">Más info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-fuchsia">
                <div class="inner">
                    <h3>{{ $totalProyectos }}</h3>
                    <p>Total de Proyectos</p>
                </div>
                <div class="icon">
                    <i class="fas fa-folder"></i>
                </div>
                <a href="{{ route('proyectos.index') }}" class="small-box-footer">Más info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6 col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Estado de Proyectos</h3>
                </div>
                <div class="card-body">
                    <div class="legend d-flex justify-content-center mb-3">
                        <span class="pr-4">
                            <i class="fas fa-square" style="color: rgba(75, 192, 192, 1);"></i> Entregado
                        </span>
                        <span class="pr-4">
                            <i class="fas fa-square" style="color: rgba(255, 165, 0, 1);"></i> En Proceso
                        </span>
                        <span>
                            <i class="fas fa-square" style="color: rgba(255, 99, 132, 1);"></i> No Entregado
                        </span>
                    </div>
                    <canvas id="estadoProyectosChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Distribución de Sexo</h3>
                </div>
                <div class="card-body">
                    <div class="legend d-flex justify-content-center mb-3">
                        <span class="pr-4">
                            <i class="fas fa-square" style="color: rgba(75, 192, 192, 1);"></i> Masculino
                        </span>
                        <span>
                            <i class="fas fa-square" style="color: rgba(255, 99, 132, 1);"></i> Femenino
                        </span>
                    </div>
                    <canvas id="sexoChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4 col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Recursos Recientes</h3>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach ($recentActivities['resources'] as $activity)
                            <li class="list-group-item">
                                {{ $activity['description'] }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Personas Recientes</h3>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach ($recentActivities['persons'] as $activity)
                            <li class="list-group-item">
                                {{ $activity['description'] }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Proyectos Recientes</h3>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach ($recentActivities['projects'] as $activity)
                            <li class="list-group-item">
                                {{ $activity['description'] }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('estadoProyectosChart').getContext('2d');
        var estadoProyectosChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Entregado', 'En Proceso', 'No Entregado'],
                datasets: [{
                    data: [
                        {{ $proyectosEstados['Entregado'] }},
                        {{ $proyectosEstados['En Proceso'] }},
                        {{ $proyectosEstados['No Entregado'] }}
                    ],
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(255, 165, 0, 0.2)',
                        'rgba(255, 99, 132, 0.2)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 165, 0, 1)',
                        'rgba(255, 99, 132, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        var ctx2 = document.getElementById('sexoChart').getContext('2d');
        var sexoChart = new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: ['Masculino', 'Femenino'],
                datasets: [{
                    data: @json($sexoData),
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(255, 99, 132, 0.2)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 99, 132, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@stop
