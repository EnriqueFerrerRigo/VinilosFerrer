{{-- resources/views/home.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="hero-section py-5 mb-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-7">
                <h1 class="hero-title">REVIVE LA MÚSICA CON EL ALMA</h1>
                <p class="lead">Colecciona, escucha y siente el vinilo como nunca antes</p>
                <div class="mt-3">
                    <a href="#" class="btn btn-dark me-2">Explorar tienda</a>
                    <a href="#" class="btn btn-outline-dark">Ver novedades</a>
                </div>
            </div>
            <div class="col-md-5 text-center">
                <img src="/images/vinilo.png" alt="Vinilo destacado" class="img-fluid hero-vinyl">
            </div>
        </div>
    </div>
</div>

<div class="container mb-5">
    <h2 class="section-title">TOP VENTAS DEL MES</h2>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-4">
        @foreach ($albumsDestacados as $album)
        <div class="col text-center">
            <img src="{{ asset($album->imagen) }}" class="img-fluid mb-2" alt="{{ $album->titulo }}">
            <p class="fw-bold mb-0">{{ $album->artista->nombre }} - {{ $album->titulo }}</p>
            <p>{{ number_format($album->precio, 2) }}€</p>
        </div>
        @endforeach
    </div>
</div>

<div class="container mb-5">
    <h2 class="section-title">VINILOS DE COLECCIÓN</h2>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-4">
        @foreach ($albumsDestacados as $album)
        <div class="col text-center">
            <img src="{{ asset($album->imagen) }}" class="img-fluid mb-2" alt="{{ $album->titulo }}">
            <p class="fw-bold mb-0">{{ $album->artista->nombre }} - {{ $album->titulo }}</p>
            <p>{{ number_format($album->precio, 2) }}€</p>
        </div>
        @endforeach
    </div>
</div>
@endsection
