@extends('adminlte::page')

@section('title', 'Editar Recurso')

@section('content_header')
<h1 class="text-center"><strong>Editar Recurso</strong></h1>
@stop

@section('content')

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('recursos.update', $recurso->Id_recurso) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label for="Descripcion">Descripción:</label>
                    <input type="text" name="Descripcion" class="form-control" value="{{ $recurso->Descripcion }}" required>
                </div>
                <div class="form-group">
                    <label for="Valor">Valor:</label>
                    <input type="number" name="Valor" class="form-control" value="{{ $recurso->Valor }}" required>
                </div>
                <div class="form-group">
                    <label for="Unidad_de_medida">Unidad de Medida:</label>
                    <input type="text" name="Unidad_de_medida" class="form-control" value="{{ $recurso->Unidad_de_medida }}" required>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Actualizar</button>
                <a href="{{ route('recursos.index') }}" class="btn btn-danger">Cancelar</a>
            </div>
        </div>
    </form>
@stop
