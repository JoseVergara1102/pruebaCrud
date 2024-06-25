@extends('adminlte::page')

@section('title', 'Editar Persona')

@section('content_header')
<h1 class="text-center"><strong>Editar Persona</strong></h1>
@stop

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('personas.update', $persona->Id_persona) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label for="Nombre">Nombre:</label>
                    <input type="text" name="Nombre" class="form-control" value="{{ $persona->Nombre }}" required>
                </div>
                <div class="form-group">
                    <label for="Apellidos">Apellidos:</label>
                    <input type="text" name="Apellidos" class="form-control" value="{{ $persona->Apellidos }}" required>
                </div>
                <div class="form-group">
                    <label for="Direccion">Dirección:</label>
                    <input type="text" name="Direccion" class="form-control" value="{{ $persona->Direccion }}" required>
                </div>
                <div class="form-group">
                    <label for="Telefono">Teléfono:</label>
                    <input type="text" name="Telefono" class="form-control" value="{{ $persona->Telefono }}" required>
                </div>
                <div class="form-group">
                    <label for="Sexo">Sexo:</label>
                    <select name="Sexo" class="form-control" required>
                        <option value="" disabled selected>Seleccione Su Sexo</option>
                        <option value="Masculino" {{ $persona->Sexo == 'Masculino' ? 'selected' : '' }}>Masculino</option>
                        <option value="Femenino" {{ $persona->Sexo == 'Femenino' ? 'selected' : '' }}>Femenino</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="Profesion">Profesión:</label>
                    <input type="text" name="Profesion" class="form-control" value="{{ $persona->Profesion }}" required>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Actualizar</button>
                <a href="{{ route('personas.index') }}" class="btn btn-danger">Cancelar</a>
            </div>
        </div>
    </form>
@stop
