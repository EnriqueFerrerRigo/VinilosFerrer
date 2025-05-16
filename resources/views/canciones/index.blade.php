@extends('layouts.app')

@section('content')
    <h1>Lista de Canciones</h1>

    <!-- Mostrar mensaje de éxito si existe -->
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Link para crear una nueva canción -->
    <a href="{{ route('canciones.create') }}">Añadir nueva canción</a>

    <!-- Listado de canciones -->
    <ul>
        @foreach ($canciones as $cancion)
            <li>
                <!-- Mostrar título, álbum y duración -->
                {{ $cancion->titulo }} - Álbum: {{ $cancion->album->titulo }} - Duración: {{ gmdate('i:s', $cancion->duracion) }}

                <!-- Link para editar la canción -->
                <a href="{{ route('canciones.edit', $cancion->id) }}">Editar</a>

                <!-- Formulario para eliminar la canción -->
                <form action="{{ route('canciones.destroy', $cancion->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('¿Seguro que quieres eliminar esta canción?')">Eliminar</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
