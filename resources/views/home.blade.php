{{-- resources/views/home.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="hero-section">
    <div class="container">
        <div class="row align-items-center position-relative">
            <div class="col-md-7">
                <h1 class="hero-title">REVIVE LA MÚSICA CON EL ALMA</h1>
                <p class="lead">Colecciona, escucha y siente el vinilo como nunca antes</p>
                <div class="mt-3">
                    <a href="{{ route('albums.catalogo') }}" class="btn btn-dark me-2">Explorar tienda</a>
                    <a href="#" class="btn btn-outline-dark">Ver novedades</a>
                </div>
            </div>
            <!-- Imagen disco flotante -->
            <div class="col-md-5 d-none d-md-block position-relative">
                <img src="{{ asset('images/DiscoBanner.png') }}" alt="Vinilo destacado" class="hero-vinyl position-absolute end-0 top-50 translate-middle-y">
            </div>
        </div>
    </div>
</div>

<div class="container container-top-ventas mb-5">
    <h2 class="section-title">TOP VENTAS DEL MES</h2>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-4">
        @foreach ($albumsDestacados as $album)
        <div class="col text-center album-card">
            <img src="{{ asset($album->imagen) }}" class="img-fluid mb-2" alt="{{ $album->titulo }}">
            <p class="fw-bold">{{ $album->artista->nombre }} - {{ $album->titulo }}</p>
            <p class="text-muted">{{ number_format($album->precio, 2) }}€</p>
        </div>
        @endforeach
    </div>
</div>

<div class="container mb-5">
    <h2 class="section-title">VINILOS DE COLECCIÓN</h2>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-4">
        @foreach ($albumsDestacados as $album)
        <div class="col text-center album-card">
            <img src="{{ asset($album->imagen) }}" class="img-fluid mb-2" alt="{{ $album->titulo }}">
            <p class="fw-bold">{{ $album->artista->nombre }} - {{ $album->titulo }}</p>
            <p class="text-muted">{{ number_format($album->precio, 2) }}€</p>
        </div>
        @endforeach
    </div>
</div>
@endsection
