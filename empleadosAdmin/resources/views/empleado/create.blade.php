<!-- resources/views/empleados/create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Nuevo Empleado</h1>

    <!-- Mostrar errores de validación, si los hay -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Formulario para crear un nuevo empleado -->
    <form action="{{ route('empleados.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre') }}" required>
        </div>

        <div class="form-group">
            <label for="puesto">Puesto</label>
            <input type="text" class="form-control" id="puesto" name="puesto" value="{{ old('puesto') }}" required>
        </div>

        <div class="form-group">
            <label for="email">Correo Electrónico</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ route('empleados.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
@endsection
