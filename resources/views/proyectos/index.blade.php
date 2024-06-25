@extends('adminlte::page')

@section('title', 'Lista de Proyectos')

@section('content_header')
    <h1 class="text-center font-bold"><strong>LISTA DE PROYECTOS</strong></h1>
@stop

@section('content')

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="table-responsive">
    <table id="proyectos-table" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Descripción</th>
                <th>Fecha Inicio</th>
                <th>Fecha Entrega</th>
                <th>Valor</th>
                <th>Lugar</th>
                <th>Responsable</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($proyectos as $proyecto)
                <tr>
                    <td>{{ $proyecto->Id_proyecto }}</td>
                    <td>{{ $proyecto->Descripcion }}</td>
                    <td>{{ $proyecto->Fecha_inicio }}</td>
                    <td>{{ $proyecto->Fecha_entrega }}</td>
                    <td>{{ $proyecto->Valor }}</td>
                    <td>{{ $proyecto->Lugar }}</td>
                    <td>{{ $proyecto->Responsable }}</td>
                    <td>{{ $proyecto->Estado }}</td>
                    <td>
                        <a href="{{ route('proyectos.show', $proyecto->Id_proyecto) }}" class="btn btn-info btn-sm">Mostrar</a>
                        <a href="{{ route('proyectos.edit', $proyecto->Id_proyecto) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('proyectos.destroy', $proyecto->Id_proyecto) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de querer eliminar este proyecto?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@stop

@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
@stop

@section('js')
    <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#proyectos-table').DataTable({
                paging: true,
                lengthChange: true,
                searching: true,
                ordering: true,
                info: true,
                autoWidth: false,
                responsive: true,
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json'
                },
                "pageLength": 5,
                "lengthMenu": [5, 10, 25, 50, 75, 100],
                "order": [[0, "asc"]]
            });
        });
    </script>
@stop
