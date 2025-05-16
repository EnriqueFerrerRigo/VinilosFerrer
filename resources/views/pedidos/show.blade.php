{{-- resources/views/pedidos/show.blade.php --}}
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalle del Pedido #{{ $pedido->id }}</h1>

        <p><strong>Fecha:</strong> {{ $pedido->fecha->format('d/m/Y H:i') }}</p>
        <p><strong>Total:</strong> €{{ number_format($pedido->total, 2) }}</p>
        <p><strong>Estado:</strong> {{ $pedido->estado ?? 'Pendiente' }}</p>

        <h3>Álbumes en este pedido:</h3>

        @if($pedido->pedidosAlbum->isEmpty())
            <p>No hay álbumes asociados a este pedido.</p>
        @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Álbum</th>
                        <th>Cantidad</th>
                        <th>Precio unitario (€)</th>
                        <th>Subtotal (€)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pedido->pedidosAlbum as $detalle)
                        <tr>
                            <td>{{ $detalle->album->titulo ?? 'Álbum eliminado' }}</td>
                            <td>{{ $detalle->cantidad }}</td>
                            <td>{{ number_format($detalle->precio_unitario, 2) }}</td>
                            <td>{{ number_format($detalle->cantidad * $detalle->precio_unitario, 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        <a href="{{ route('pedidos.index') }}" class="btn btn-secondary mt-3">Volver a la lista</a>
    </div>
@endsection
