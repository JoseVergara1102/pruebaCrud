@extends('adminlte::page')

@section('title', 'Agregar Persona')

@section('content_header')
    <h1 class="text-center"><strong>Agregar Persona</strong></h1>
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

    <div class="card">
        <div class="card-body">
            <form action="{{ route('personas.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="Nombre" class="form-label">Nombre:</label>
                    <input type="text" name="Nombre" class="form-control @error('Nombre') is-invalid @enderror" placeholder="Ingrese Su Nombre" required>
                    @error('Nombre')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="Apellidos" class="form-label">Apellidos:</label>
                    <input type="text" name="Apellidos" class="form-control @error('Apellidos') is-invalid @enderror" placeholder="Ingrese Sus Apellidos" required>
                    @error('Apellidos')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="Direccion" class="form-label">Dirección:</label>
                    <input type="text" name="Direccion" class="form-control @error('Direccion') is-invalid @enderror" placeholder="Ingrese Su Dirección" required>
                    @error('Direccion')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="Telefono" class="form-label">Teléfono:</label>
                    <input type="text" name="Telefono" class="form-control @error('Telefono') is-invalid @enderror" placeholder="Digite Su Teléfono" required>
                    @error('Telefono')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="Sexo" class="form-label">Sexo:</label>
                    <select name="Sexo" class="form-control @error('Sexo') is-invalid @enderror" required>
                        <option value="" disabled selected>Seleccione Su Sexo</option>
                        <option value="Masculino">Masculino</option>
                        <option value="Femenino">Femenino</option>
                    </select>
                    @error('Sexo')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>


                <div class="mb-3">
                    <label for="Profesion" class="form-label">Profesión:</label>
                    <input type="text" name="Profesion" class="form-control @error('Profesion') is-invalid @enderror" placeholder="Ingrese Su Profesión" required>
                    @error('Profesion')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">Agregar</button>
                    <a href="{{ route('personas.index') }}" class="btn btn-danger">Cancelar</a>
                </div>
            </form>
        </div>
    </div>

@stop
