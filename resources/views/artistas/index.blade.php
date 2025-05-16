@extends('layouts.app')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <h1>Lista de Artistas</h1>

    <a href="{{ route('artistas.create') }}">Añadir nuevo artista</a>

    <ul>
        @foreach ($artistas as $artista)
            <li>
                {{ $artista->nombre }}

                <a href="{{ route('artistas.edit', $artista->id) }}">Editar</a>

                <form action="{{ route('artistas.destroy', $artista->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('¿Estás seguro de eliminar este artista?')">Eliminar</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
