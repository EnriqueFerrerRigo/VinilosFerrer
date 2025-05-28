{{-- resources/views/genero.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="genero-hero text-white py-5 text-center" style="background: url('/images/generos/rock-banner.jpg') center center / cover no-repeat;">
    <div class="container">
        <h1 class="fw-bold display-4">ROCK</h1>
        <p class="lead">Sumérgete en los dásicos y las nuevas joyas del rock</p>
    </div>
</div>

<div class="container my-5 text-center">
    <div class="mb-4 d-flex flex-wrap justify-content-center gap-3">
        <button class="btn btn-outline-dark">Vinilos nuevos</button>
        <button class="btn btn-outline-dark">Menos de 25€</button>
        <button class="btn btn-outline-dark">Populares</button>
        <button class="btn btn-outline-dark">Ediciones especiales</button>
    </div>

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
        @php
            $albumes = array_fill(0, 3, [
                'titulo' => 'Velvet Dreams',
                'artista' => 'Nova Rivers',
                'precio' => '15,00€',
                'imagen' => 'velvet-dreams.jpg'
            ]);
        @endphp

        @foreach ($albumes as $album)
        <div class="col">
            <div class="card h-100 shadow-sm">
                <img src="{{ asset('images/albums/' . $album['imagen']) }}" class="card-img-top" alt="{{ $album['titulo'] }}">
                <div class="card-body">
                    <h6 class="fw-bold mb-0">{{ $album['artista'] }}</h6>
                    <p class="text-muted mb-2">{{ $album['titulo'] }}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="fw-bold">{{ $album['precio'] }}</span>
                        <a href="#" class="btn btn-outline-dark btn-sm">Ver más</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
