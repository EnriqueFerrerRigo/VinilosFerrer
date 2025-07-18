@extends('layouts.app')

@section('title', 'Carrito')

@section('content')
<h2 class="mb-4 text-center fw-bold">Tu Carrito</h2>

@if($carrito->isEmpty())
  <p class="text-center">Tu carrito está vacío.</p>
@else
  <table class="table table-striped align-middle">
    <thead>
      <tr>
        <th>Producto</th>
        <th>Cantidad</th>
        <th>Precio unitario</th>
        <th>Total</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach($carrito as $item)
      <tr>
        <td>{{ $item->album->titulo }} - {{ $item->album->artista->nombre }}</td>
        <td>
          <form method="POST" action="{{ route('carrito.update', $item->id) }}">
            @csrf
            @method('PATCH')
            <input type="number" name="cantidad" min="1" value="{{ $item->cantidad }}" class="form-control form-control-sm" style="width: 70px;" onchange="this.form.submit()">
          </form>
        </td>
        <td>{{ number_format($item->album->precio, 2, ',', '.') }} €</td>
        <td>{{ number_format($item->album->precio * $item->cantidad, 2, ',', '.') }} €</td>
        <td>
          <form method="POST" action="{{ route('carrito.destroy', $item->id) }}">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger btn-sm">Eliminar</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>

  <div class="text-end fw-bold fs-5">
    Total: {{ number_format($carrito->sum(fn($item) => $item->album->precio * $item->cantidad), 2, ',', '.') }} €
  </div>
@endif
@endsection
