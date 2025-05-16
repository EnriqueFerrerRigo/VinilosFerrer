@extends('layouts.app')

@section('content')
<h1>Detalles de Pedidos</h1>

<a href="{{ route('pedidos_album.create') }}">Nuevo detalle de pedido</a>

@if(session('success'))
    <div>{{ session('success') }}</div>
@endif

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Pedido</th>
            <th>Álbum</th>
            <th>Cantidad</th>
            <th>Precio Unitario</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($detalles as $detalle)
        <tr>
            <td>{{ $detalle->id }}</td>
            <td>{{ $detalle->pedido->id }}</td>
            <td>{{ $detalle->album->titulo }}</td>
            <td>{{ $detalle->cantidad }}</td>
            <td>{{ $detalle->precio_unitario }}</td>
            <td>
                <a href="{{ route('pedidos_album.edit', $detalle->id) }}">Editar</a>
                <form action="{{ route('pedidos_album.destroy', $detalle->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('¿Seguro que quieres eliminar?')">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
