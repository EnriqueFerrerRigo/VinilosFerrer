@extends('layouts.app')

@section('content')
    <h1>Editar Artista</h1>

    <form action="{{ route('artistas.update', $artista->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label for="nombre">Nombre:</label><br>
        <input type="text" id="nombre" name="nombre" value="{{ old('nombre', $artista->nombre) }}" required><br><br>

        <label for="bio">Biografía:</label><br>
        <textarea id="bio" name="bio">{{ old('bio', $artista->bio) }}</textarea><br><br>

        <label for="imagen">Imagen (URL o archivo):</label><br>
        <input type="file" id="imagen" name="imagen"><br><br>

        @if ($artista->imagen)
            <img src="{{ asset($artista->imagen) }}" alt="Imagen artista" width="150"><br><br>
        @endif

        <button type="submit">Actualizar</button>
    </form>
@endsection
