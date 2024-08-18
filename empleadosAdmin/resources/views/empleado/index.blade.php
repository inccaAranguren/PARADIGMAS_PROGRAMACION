<!-- resources/views/empleados/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Listado de Empleados</h1>

    <!-- Mostrar mensajes de éxito, si los hay -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Botón para añadir un nuevo empleado -->
    <a href="{{ route('empleados.create') }}" class="btn btn-primary mb-3">Añadir Nuevo Empleado</a>

    <!-- Tabla de empleados -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Puesto</th>
                <th>Email</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($empleados as $empleado)
                <tr>
                    <td>{{ $empleado->id }}</td>
                    <td>{{ $empleado->nombre }}</td>
                    <td>{{ $empleado->puesto }}</td>
                    <td>{{ $empleado->email }}</td>
                    <td>
                        <a href="{{ route('empleados.edit', $empleado->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('empleados.destroy', $empleado->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que quieres eliminar este empleado?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Paginación (si aplica) -->
    {{ $empleados->links() }}
</div>
@endsection
