@extends('layouts.app')

@section('content')
<h1>Editar detalle de pedido</h1>

<form action="{{ route('pedidos_album.update', $pedidosAlbum->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Pedido:</label>
    <select name="pedido_id" required>
        @foreach($pedidos as $pedido)
            <option value="{{ $pedido->id }}" {{ $pedido->id == $pedidosAlbum->pedido_id ? 'selected' : '' }}>
                {{ $pedido->id }}
            </option>
        @endforeach
    </select>

    <label>Álbum:</label>
    <select name="album_id" required>
        @foreach($albums as $album)
            <option value="{{ $album->id }}" {{ $album->id == $pedidosAlbum->album_id ? 'selected' : '' }}>
                {{ $album->titulo }}
            </option>
        @endforeach
    </select>

    <label>Cantidad:</label>
    <input type="number" name="cantidad" min="1" value="{{ $pedidosAlbum->cantidad }}" required>

    <label>Precio Unitario:</label>
    <input type="number" name="precio_unitario" step="0.01" min="0" value="{{ $pedidosAlbum->precio_unitario }}" required>

    <button type="submit">Actualizar</button>
</form>

@endsection
