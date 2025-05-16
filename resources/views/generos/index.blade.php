@extends('layouts.app')

@section('content')
<h1>Géneros</h1>

<a href="{{ route('generos.create') }}" class="btn btn-primary mb-3">Crear nuevo género</a>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($generos as $genero)
            <tr>
                <td>{{ $genero->nombre }}</td>
                <td>
                    <a href="{{ route('generos.edit', $genero) }}" class="btn btn-sm btn-warning">Editar</a>

                    <form action="{{ route('generos.destroy', $genero) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('¿Seguro que quieres eliminar?')" class="btn btn-sm btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
