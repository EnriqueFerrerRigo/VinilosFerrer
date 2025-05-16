@extends('layouts.app')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <h1>Lista de Álbumes</h1>

    <a href="{{ route('albums.create') }}">Añadir nuevo álbum</a>

    <ul>
        @foreach ($albums as $album)
            <li>
                <strong>{{ $album->titulo }}</strong> -
                {{ $album->artista->nombre }} -
                {{ $album->genero->nombre }} -
                {{ $album->anio }} -
                ${{ $album->precio }}

                <a href="{{ route('albums.edit', $album->id) }}">Editar</a>

                <form action="{{ route('albums.destroy', $album->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('¿Seguro que quieres eliminar este álbum?')">Eliminar</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
