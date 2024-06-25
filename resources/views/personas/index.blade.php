@extends('adminlte::page')

@section('title', 'Lista de Personas')

@section('content_header')
    <h1 class="text-center font-bold text-black"><strong>LISTA DE PERSONAS</strong></h1>
@stop

@section('content')

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive">
        <table id="personas-table" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Dirección</th>
                    <th>Teléfono</th>
                    <th>Sexo</th>
                    <th>Profesión</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($personas as $persona)
                    <tr>
                        <td>{{ $persona->Id_persona }}</td>
                        <td>{{ $persona->Nombre }}</td>
                        <td>{{ $persona->Apellidos }}</td>
                        <td>{{ $persona->Direccion }}</td>
                        <td>{{ $persona->Telefono }}</td>
                        <td>{{ $persona->Sexo }}</td>
                        <td>{{ $persona->Profesion }}</td>
                        <td>
                            <a href="{{ route('personas.show', $persona->Id_persona) }}" class="btn btn-info btn-sm">Mostrar</a>
                            <a href="{{ route('personas.edit', $persona->Id_persona) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('personas.destroy', $persona->Id_persona) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de querer eliminar esta persona?')">Eliminar</button>
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
            $('#personas-table').DataTable({
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
