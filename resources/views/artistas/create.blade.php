@extends('layouts.app')

@section('content')
    <h1>Nuevo Artista</h1>

    <form action="{{ route('artistas.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label for="nombre">Nombre:</label><br>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="bio">Biografía:</label><br>
        <textarea id="bio" name="bio"></textarea><br><br>

        <label for="imagen">Imagen (URL o archivo):</label><br>
        <input type="file" id="imagen" name="imagen"><br><br>

        <button type="submit">Guardar</button>
    </form>
@endsection
