@extends('adminlte::page')

@section('title', 'Ver Recurso')

@section('content_header')
<h1 class="text-center font-bold"><strong>Recurso: </strong>{{$recurso->Descripcion}}</h1>
@stop

@section('content')

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Detalles del Recurso</h3>
        </div>
        <div class="card-body">
            <p><strong>ID:</strong> {{ $recurso->Id_recurso }}</p>
            <p><strong>Descripción:</strong> {{ $recurso->Descripcion }}</p>
            <p><strong>Valor:</strong> {{ $recurso->Valor }}</p>
            <p><strong>Unidad de Medida:</strong> {{ $recurso->Unidad_de_medida }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('recursos.edit', $recurso->Id_recurso) }}" class="btn btn-warning">Editar</a>
            <form action="{{ route('recursos.destroy', $recurso->Id_recurso) }}" method="POST" style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Eliminar</button>
            </form>
            <a href="{{ route('recursos.index') }}" class="btn btn-secondary">Volver a la lista</a>
        </div>
    </div>

@stop
