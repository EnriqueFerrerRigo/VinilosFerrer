<!--extends('layouts.app')

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
          <form method="POST" action="{{ route('carrito.actualizar', $item->id) }}">
            @csrf
            @method('PUT')
            <input type="number" name="cantidad" min="1" value="{{ $item->cantidad }}" class="form-control form-control-sm" style="width: 70px;" onchange="this.form.submit()">
          </form>
        </td>
        <td>{{ number_format($item->album->precio, 2, ',', '.') }} €</td>
        <td>{{ number_format($item->album->precio * $item->cantidad, 2, ',', '.') }} €</td>
        <td>
          <form method="POST" action="{{ route('carrito.eliminar', $item->id) }}">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger btn-sm">Eliminar</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>

  <div class="text-end fw-bold fs-5">Total: {{ number_format($total, 2, ',', '.') }} €</div>
  <div class="text-end mt-3">
    <form method="POST" action="{{ route('pedido.finalizar') }}">
      @csrf
      <button class="btn btn-success">Finalizar compra</button>
    </form>
  </div>
@endif

@endsection
-->
{{-- resources/views/carrito.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1 class="text-center fw-bold">TU CARRITO</h1>
    <p class="text-center text-muted">(<span id="carrito-total-articulos">0</span> ARTÍCULOS)</p>

    <div id="cart-list" class="cart-list border-top border-bottom" style="max-height: 500px; overflow-y: auto;">
        <!-- Artículos del carrito se generan dinámicamente aquí -->
    </div>

    <div class="d-flex justify-content-between align-items-center mt-4">
        <a href="#" class="btn btn-outline-secondary">Seguir comprando</a>
        <div>
            <span id="carrito-total-precio" class="fw-bold me-3 fs-5">0,00€</span>
            <a href="#" class="btn btn-dark">Finalizar compra</a>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    const productos = [
        { id: 1, artista: 'Nova Rivers', album: 'Velvet Dreams', precio: 15.00, cantidad: 2, imagen: 'velvet-dreams-vinyl.png' },
        { id: 2, artista: 'Nova Rivers', album: 'Velvet Dreams', precio: 15.00, cantidad: 2, imagen: 'velvet-dreams-vinyl.png' },
        { id: 3, artista: 'Nova Rivers', album: 'Velvet Dreams', precio: 15.00, cantidad: 2, imagen: 'velvet-dreams-vinyl.png' },
        { id: 4, artista: 'Nova Rivers', album: 'Velvet Dreams', precio: 15.00, cantidad: 2, imagen: 'velvet-dreams-vinyl.png' },
        { id: 5, artista: 'Nova Rivers', album: 'Velvet Dreams', precio: 15.00, cantidad: 2, imagen: 'velvet-dreams-vinyl.png' },
        { id: 6, artista: 'Nova Rivers', album: 'Velvet Dreams', precio: 15.00, cantidad: 2, imagen: 'velvet-dreams-vinyl.png' },
        { id: 7, artista: 'Nova Rivers', album: 'Velvet Dreams', precio: 15.00, cantidad: 2, imagen: 'velvet-dreams-vinyl.png' },
        { id: 8, artista: 'Nova Rivers', album: 'Velvet Dreams', precio: 15.00, cantidad: 2, imagen: 'velvet-dreams-vinyl.png' },
    ];

    function renderCarrito() {
        const contenedor = document.getElementById('cart-list');
        contenedor.innerHTML = '';
        let total = 0;
        let totalArticulos = 0;

        productos.forEach(producto => {
            const subtotal = producto.precio * producto.cantidad;
            total += subtotal;
            totalArticulos += producto.cantidad;

            const fila = document.createElement('div');
            fila.className = 'row py-4 align-items-center border-bottom';
            fila.innerHTML = `
                <div class="col-md-2 text-center">
                    <img src="/images/albums/${producto.imagen}" alt="${producto.album}" class="img-fluid" style="max-height: 100px;">
                    <a href="#" class="d-block mt-2 text-danger small">Eliminar</a>
                </div>
                <div class="col-md-7">
                    <h5 class="fw-bold mb-1">${producto.artista}</h5>
                    <p class="text-muted mb-2">${producto.album}</p>
                    <div class="d-flex align-items-center gap-2">
                        <button class="btn btn-outline-dark btn-sm">-</button>
                        <span class="px-2">${producto.cantidad}</span>
                        <button class="btn btn-outline-dark btn-sm">+</button>
                        <span class="ms-3"><i class="bi bi-trash"></i> ${producto.precio.toFixed(2)}€</span>
                    </div>
                </div>
                <div class="col-md-3 text-end">
                    <span class="fs-5 fw-bold">${subtotal.toFixed(2)}€</span>
                </div>
            `;
            contenedor.appendChild(fila);
        });

        document.getElementById('carrito-total-precio').textContent = total.toFixed(2) + '€';
        document.getElementById('carrito-total-articulos').textContent = totalArticulos;
    }

    document.addEventListener('DOMContentLoaded', renderCarrito);
</script>
@endsection
