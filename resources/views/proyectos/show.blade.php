@extends('adminlte::page')

@section('title', 'Ver Proyecto')

@section('content_header')
<h1 class="text-center font-bold"><strong>Proyecto: </strong>{{$proyecto->Descripcion}}</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Detalles del Proyecto</h3>
    </div>
    <div class="card-body">
        <p><strong>ID:</strong> {{ $proyecto->Id_proyecto }}</p>
        <p><strong>Descripción:</strong> {{ $proyecto->Descripcion }}</p>
        <p><strong>Fecha de Inicio:</strong> {{ $proyecto->Fecha_inicio }}</p>
        <p><strong>Fecha de Entrega:</strong> {{ $proyecto->Fecha_entrega }}</p>
        <p><strong>Valor:</strong> {{ $proyecto->Valor }}</p>
        <p><strong>Lugar:</strong> {{ $proyecto->Lugar }}</p>
        <p><strong>Responsable:</strong> {{ $proyecto->responsable ? $proyecto->responsable->Nombre . ' ' . $proyecto->responsable->Apellidos . ' - ' . $proyecto->responsable->Profesion : 'N/A' }}</p>
        <p><strong>Estado:</strong> {{ $proyecto->Estado }}</p>
    </div>
    <div class="card-footer">
        <a href="{{ route('proyectos.edit', $proyecto->Id_proyecto) }}" class="btn btn-warning">Editar</a>
        <form action="{{ route('proyectos.destroy', $proyecto->Id_proyecto) }}" method="POST" style="display:inline-block;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Eliminar</button>
    </form>
    <a href="{{ route('proyectos.index') }}" class="btn btn-secondary">Volver a la lista</a>
    </div>
</div>
@stop
