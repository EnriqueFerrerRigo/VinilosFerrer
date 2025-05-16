@extends('layouts.app')

@section('content')
<h1>Nuevo detalle de pedido</h1>

<form action="{{ route('pedidos_album.store') }}" method="POST">
    @csrf
    <label>Pedido:</label>
    <select name="pedido_id" required>
        @foreach($pedidos as $pedido)
            <option value="{{ $pedido->id }}">{{ $pedido->id }}</option>
        @endforeach
    </select>

    <label>Álbum:</label>
    <select name="album_id" required>
        @foreach($albums as $album)
            <option value="{{ $album->id }}">{{ $album->titulo }}</option>
        @endforeach
    </select>

    <label>Cantidad:</label>
    <input type="number" name="cantidad" min="1" required>

    <label>Precio Unitario:</label>
    <input type="number" name="precio_unitario" step="0.01" min="0" required>

    <button type="submit">Guardar</button>
</form>

@endsection
