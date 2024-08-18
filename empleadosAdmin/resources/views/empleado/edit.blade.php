<!-- resources/views/empleados/edit.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Empleado</h1>

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

    <!-- Formulario de edición -->
    <form action="{{ route('empleados.update', $empleado->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre', $empleado->nombre) }}" required>
        </div>

        <div class="form-group">
            <label for="puesto">Puesto</label>
            <input type="text" class="form-control" id="puesto" name="puesto" value="{{ old('puesto', $empleado->puesto) }}" required>
        </div>

        <div class="form-group">
            <label for="email">Correo Electrónico</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $empleado->email) }}" required>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ route('empleados.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
@endsection