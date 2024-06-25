@extends('adminlte::page')

@section('title', 'Detalles de la Persona')

@section('content_header')
<h1 class="text-center font-bold"><strong>Persona: </strong>{{$persona->Nombre.' '.$persona->Apellidos}}</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Detalles de la Persona</h3>
        </div>
        <div class="card-body">
            <p><strong>ID:</strong> {{ $persona->Id_persona }}</p>
            <p><strong>Nombre:</strong> {{ $persona->Nombre }}</p>
            <p><strong>Apellidos:</strong> {{ $persona->Apellidos }}</p>
            <p><strong>Dirección:</strong> {{ $persona->Direccion }}</p>
            <p><strong>Teléfono:</strong> {{ $persona->Telefono }}</p>
            <p><strong>Sexo:</strong> {{ $persona->Sexo }}</p>
            <p><strong>Profesión:</strong> {{ $persona->Profesion }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('personas.edit', $persona->Id_persona) }}" class="btn btn-warning">Editar</a>
            <form action="{{ route('personas.destroy', $persona->Id_persona) }}" method="POST" style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Eliminar</button>
            </form>
            <a href="{{ route('personas.index') }}" class="btn btn-secondary">Volver a la lista</a>
        </div>
    </div>

@stop
