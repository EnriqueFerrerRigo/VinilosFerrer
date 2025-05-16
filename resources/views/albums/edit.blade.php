@extends('layouts.app')

@section('content')
    <h1>Editar Álbum</h1>

    <form action="{{ route('albums.update', $album->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label for="titulo">Título:</label><br>
        <input type="text" id="titulo" name="titulo" value="{{ old('titulo', $album->titulo) }}" required><br><br>

        <label for="artista_id">Artista:</label><br>
        <select id="artista_id" name="artista_id" required>
            <option value="">--Selecciona un artista--</option>
            @foreach ($artistas as $artista)
                <option value="{{ $artista->id }}" @selected(old('artista_id', $album->artista_id) == $artista->id)>{{ $artista->nombre }}</option>
            @endforeach
        </select><br><br>

        <label for="genero_id">Género:</label><br>
        <select id="genero_id" name="genero_id" required>
            <option value="">--Selecciona un género--</option>
            @foreach ($generos as $genero)
                <option value="{{ $genero->id }}" @selected(old('genero_id', $album->genero_id) == $genero->id)>{{ $genero->nombre }}</option>
            @endforeach
        </select><br><br>

        <label for="anio">Año:</label><br>
        <input type="number" id="anio" name="anio" min="1900" max="{{ date('Y') }}" value="{{ old('anio', $album->anio) }}" required><br><br>

        <label for="precio">Precio:</label><br>
        <input type="number" id="precio" name="precio" step="0.01" value="{{ old('precio', $album->precio) }}" required><br><br>

        <label for="stock">Stock:</label><br>
        <input type="number" id="stock" name="stock" min="0" value="{{ old('stock', $album->stock) }}" required><br><br>

        <label for="imagen">Portada (archivo de imagen):</label><br>
        <input type="file" id="imagen" name="imagen"><br><br>

        @if ($album->imagen)
            <img src="{{ asset($album->imagen) }}" alt="Portada" width="150"><br><br>
        @endif

        <button type="submit">Actualizar</button>
    </form>
@endsection
