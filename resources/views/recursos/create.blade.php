@extends('adminlte::page')

@section('title', 'Crear Recurso')

@section('content_header')
    <h1 class="text-center"><strong>Crear Recurso</strong></h1>
@stop

@section('content')

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <form action="{{ route('recursos.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="Descripcion" class="form-label">Descripción</label>
                    <textarea name="Descripcion" class="form-control @error('Descripcion') is-invalid @enderror" placeholder="Ingrese la Descripción del Recurso" required>{{ old('Descripcion') }}</textarea>
                    @error('Descripcion')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="Valor" class="form-label">Valor</label>
                    <input type="number" name="Valor" class="form-control @error('Valor') is-invalid @enderror" placeholder="Ingrese el Valor del Recurso" required value="{{ old('Valor') }}">
                    @error('Valor')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="Unidad_de_medida" class="form-label">Unidad de Medida</label>
                    <input type="text" name="Unidad_de_medida" class="form-control @error('Unidad_de_medida') is-invalid @enderror" placeholder="Digite la Unidad de Medida del Recurso" required value="{{ old('Unidad_de_medida') }}">
                    @error('Unidad_de_medida')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a href="{{ route('recursos.index') }}" class="btn btn-danger">Cancelar</a>
                </div>
            </form>
        </div>
    </div>

@stop
