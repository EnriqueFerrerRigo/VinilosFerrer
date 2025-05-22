{{-- resources/views/home.blade.php --}}
@extends('layouts.app')


@section('content')
<div class="container-fluid bg-light py-5">
    <div class="container text-center">
        <div class="row align-items-center">
            <div class="col-md-8 text-md-start">
                <h1 class="display-5 fw-bold">REVIVE LA MÚSICA CON EL ALMA</h1>
                <p class="lead">Colecciona, escucha y siente el vinilo como nunca antes</p>
                <div class="mt-3">
                    <a href="#" class="btn btn-dark me-2">Explorar tienda</a>
                    <a href="#" class="btn btn-outline-secondary">Ver novedades</a>
                </div>
            </div>
            <div class="col-md-4 text-center">
                <img src="/images/vinilo.png" alt="Vinilo destacado" class="img-fluid" style="max-width: 200px;">
            </div>
        </div>
    </div>
</div>

<div class="container my-5">
    <h2 class="text-center fw-bold mb-4">TOP VENTAS DEL MES</h2>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-4">
        @foreach ($albumsDestacados as $album)
        <div class="col text-center">
            <img src="{{ asset('storage/' . $album->portada) }}" class="img-fluid mb-2" alt="{{ $album->titulo }}">
            <p class="fw-bold mb-0">{{ $album->artista->nombre }} - {{ $album->titulo }}</p>
            <p>{{ number_format($album->precio, 2) }}€</p>
        </div>
        @endforeach
    </div>
</div>

<div class="container mb-5">
    <h2 class="text-center fw-bold mb-4">VINILOS DE COLECCIÓN</h2>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-4">
        @foreach ($albumsDestacados as $album)
        <div class="col text-center">
            <img src="{{ asset('storage/' . $album->portada) }}" class="img-fluid mb-2" alt="{{ $album->titulo }}">
            <p class="fw-bold mb-0">{{ $album->artista->nombre }} - {{ $album->titulo }}</p>
            <p>{{ number_format($album->precio, 2) }}€</p>
        </div>
        @endforeach
    </div>
</div>

<footer class="bg-secondary text-white py-3">
    <div class="container d-flex justify-content-between align-items-center">
        <span><strong>Vinilos Ferrer</strong></span>
        <small>© 2025 | Todos los derechos reservados.</small>
    </div>
</footer>
@endsection
