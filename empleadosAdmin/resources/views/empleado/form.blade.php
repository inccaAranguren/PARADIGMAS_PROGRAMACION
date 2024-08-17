@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $empleado->exists ? 'Editar Empleado' : 'Crear Empleado' }}</h1>
    
    <!-- Si estamos editando, muestra el formulario con los datos del empleado -->
    <form action="{{ $empleado->exists ? route('empleados.update', $empleado->id) : route('empleados.store') }}" method="POST">
        @csrf
        @if($empleado->exists)
            @method('PUT') <!-- Usado para las solicitudes de actualización -->
        @endif
        
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre', $empleado->nombre) }}" required>
            @error('nombre')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $empleado->email) }}" required>
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Agrega más campos según sea necesario -->

        <button type="submit" class="btn btn-primary">{{ $empleado->exists ? 'Actualizar' : 'Crear' }}</button>
    </form>
</div>
@endsection