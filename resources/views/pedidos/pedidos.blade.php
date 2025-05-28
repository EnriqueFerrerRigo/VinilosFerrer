{{-- resources/views/perfil.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="bg-light py-5 text-center">
    <h1 class="fw-bold">Hola, Enrique!</h1>
    <p class="text-muted">ejemplo@gmail.com</p>
</div>

<div class="container py-5">
    <h5 class="fw-bold mb-4">Tus pedidos recientes</h5>

    <div class="d-flex flex-column gap-3 mb-5">
        @for ($i = 0; $i < 2; $i++)
        <div class="d-flex justify-content-between align-items-center border rounded px-4 py-3">
            <div>
                <p class="mb-0 fw-bold">Pedido #1258</p>
                <small class="text-muted">14/05/2025</small>
            </div>
            <a href="#" class="btn btn-outline-dark">Ver detalle</a>
        </div>
        @endfor
    </div>

    <div class="d-flex justify-content-center gap-3">
        <a href="#" class="btn btn-outline-dark">Editar perfil</a>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-outline-dark">Cerrar sesión</button>
        </form>
    </div>
</div>
@endsection
