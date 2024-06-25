@extends('adminlte::page')

@section('title', 'Editar Proyecto')

@section('content_header')
<h1 class="text-center"><strong>Editar Proyecto</strong></h1>
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

    <form action="{{ route('proyectos.update', $proyecto->Id_proyecto) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label for="Descripcion">Descripción:</label>
                    <textarea name="Descripcion" class="form-control @error('Descripcion') is-invalid @enderror"
                        required>{{ old('Descripcion', $proyecto->Descripcion) }}</textarea>
                    @error('Descripcion')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="Fecha_inicio">Fecha de Inicio:</label>
                    <input type="date" name="Fecha_inicio"
                        class="form-control @error('Fecha_inicio') is-invalid @enderror"
                        value="{{ old('Fecha_inicio', $proyecto->Fecha_inicio) }}" required>
                    @error('Fecha_inicio')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="Fecha_entrega">Fecha de Entrega:</label>
                    <input type="date" name="Fecha_entrega"
                        class="form-control @error('Fecha_entrega') is-invalid @enderror"
                        value="{{ old('Fecha_entrega', $proyecto->Fecha_entrega) }}" required>
                    @error('Fecha_entrega')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="Valor">Valor:</label>
                    <input type="number" name="Valor" class="form-control @error('Valor') is-invalid @enderror"
                        value="{{ old('Valor', $proyecto->Valor) }}" required>
                    @error('Valor')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="Lugar">Lugar:</label>
                    <input type="text" name="Lugar" class="form-control @error('Lugar') is-invalid @enderror"
                        value="{{ old('Lugar', $proyecto->Lugar) }}" required>
                    @error('Lugar')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="Responsable">Responsable</label>
                    <select name="Responsable" class="form-control @error('Responsable') is-invalid @enderror">
                        <option value="" disabled selected>Seleccione un responsable</option>
                        @foreach($personas as $persona)
                            <option value="{{ $persona->Id_persona }}" {{ old('Responsable', $proyecto->Responsable) == $persona->Id_persona ? 'selected' : '' }}>
                                {{ $persona->Nombre }} {{ $persona->Apellidos }} - {{ $persona->Profesion}}
                            </option>
                        @endforeach
                    </select>
                    @error('Responsable')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="Estado">Estado:</label>
                    <select name="Estado" class="form-control @error('Estado') is-invalid @enderror" required>
                        <option value="" disabled selected>Seleccione el Estado del Proyecto</option>
                        <option value="Entregado" {{ old('Estado', $proyecto->Estado) == 'Entregado' ? 'selected' : '' }}>Entregado</option>
                        <option value="En Proceso" {{ old('Estado', $proyecto->Estado) == 'En Proceso' ? 'selected' : '' }}>En Proceso</option>
                        <option value="No Entregado" {{ old('Estado', $proyecto->Estado) == 'No Entregado' ? 'selected' : '' }}>No Entregado</option>
                    </select>
                    @error('Estado')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Actualizar</button>
                <a href="{{ route('proyectos.index') }}" class="btn btn-danger">Cancelar</a>
            </div>
        </div>
    </form>
@stop
