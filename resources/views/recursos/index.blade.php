@extends('adminlte::page')

@section('title', 'Lista de Recursos')

@section('content_header')
    <h1 class="text-center font-bold"><strong>LISTA DE RECURSOS</strong></h1>
@stop

@section('content')

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive">
        <table id="recursos-table" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Descripción</th>
                    <th>Valor</th>
                    <th>Unidad de Medida</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($recursos as $recurso)
                    <tr>
                        <td>{{ $recurso->Id_recurso }}</td>
                        <td>{{ $recurso->Descripcion }}</td>
                        <td>{{ $recurso->Valor }}</td>
                        <td>{{ $recurso->Unidad_de_medida }}</td>
                        <td>
                            <a href="{{ route('recursos.show', $recurso->Id_recurso) }}" class="btn btn-info btn-sm">Mostrar</a>
                            <a href="{{ route('recursos.edit', $recurso->Id_recurso) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('recursos.destroy', $recurso->Id_recurso) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de querer eliminar este recurso?')">Eliminar</button>
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
            $('#recursos-table').DataTable({
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
