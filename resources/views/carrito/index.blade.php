@extends('layouts.app')

@section('content')
<h1>Carrito de Compra</h1>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if($items->isEmpty())
    <p>Tu carrito está vacío.</p>
@else
    <table class="table">
        <thead>
            <tr>
                <th>Álbum</th>
                <th>Cantidad</th>
                <th>Precio Unitario</th>
                <th>Subtotal</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $item)
                <tr>
                    <td>{{ $item->album->titulo }}</td>
                    <td>{{ $item->cantidad }}</td>
                    <td>{{ $item->album->precio }} €</td>
                    <td>{{ number_format($item->cantidad * $item->album->precio, 2) }} €</td>
                    <td>
                        <form action="{{ route('carrito.update', $item) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('PATCH')
                            <input type="number" name="cantidad" value="{{ $item->cantidad }}" min="1" style="width:60px;">
                            <button type="submit" class="btn btn-sm btn-primary">Actualizar</button>
                        </form>

                        <form action="{{ route('carrito.destroy', $item) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif

@endsection
