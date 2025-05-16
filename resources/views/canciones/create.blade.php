@extends('layouts.app')

@section('content')
    <h1>Nueva Canción</h1>

    <!-- Formulario para crear canción -->
    <form action="{{ route('canciones.store') }}" method="POST">
        @csrf

        <!-- Campo título -->
        <label for="titulo">Título:</label><br>
        <input type="text" id="titulo" name="titulo" value="{{ old('titulo') }}" required>
        @error('titulo')
            <div style="color:red;">{{ $message }}</div>
        @enderror
        <br><br>

        <!-- Select álbum -->
        <label for="album_id">Álbum:</label><br>
        <select id="album_id" name="album_id" required>
            <option value="">--Selecciona un álbum--</option>
            @foreach ($albums as $album)
                <option value="{{ $album->id }}" @selected(old('album_id') == $album->id)>{{ $album->titulo }}</option>
            @endforeach
        </select>
        @error('album_id')
            <div style="color:red;">{{ $message }}</div>
        @enderror
        <br><br>

        <!-- Campo duración -->
        <label for="duracion">Duración (segundos):</label><br>
        <input type="number" id="duracion" name="duracion" min="1" value="{{ old('duracion') }}" required>
        @error('duracion')
            <div style="color:red;">{{ $message }}</div>
        @enderror
        <br><br>

        <!-- Botón guardar -->
        <button type="submit">Guardar</button>
    </form>
@endsection
