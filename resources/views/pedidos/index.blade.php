{{-- resources/views/pedidos/index.blade.php --}}
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Mis Pedidos</h1>

        {{-- Mensaje de éxito --}}
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if($pedidos->isEmpty())
            <p>No tienes pedidos registrados.</p>
        @else
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID Pedido</th>
                        <th>Fecha</th>
                        <th>Total (€)</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pedidos as $pedido)
                        <tr>
                            <td>{{ $pedido->id }}</td>
                            <td>{{ $pedido->fecha->format('d/m/Y H:i') }}</td>
                            <td>{{ number_format($pedido->total, 2) }}</td>
                            <td>{{ $pedido->estado ?? 'Pendiente' }}</td>
                            <td>
                                {{-- Link para ver detalles --}}
                                <a href="{{ route('pedidos.show', $pedido->id) }}" class="btn btn-primary btn-sm">Ver</a>

                                {{-- Opcional: editar o eliminar --}}
                                <a href="{{ route('pedidos.edit', $pedido->id) }}" class="btn btn-warning btn-sm">Editar</a>

                                <form action="{{ route('pedidos.destroy', $pedido->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('¿Seguro que quieres eliminar este pedido?')" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
