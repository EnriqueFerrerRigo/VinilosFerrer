{{-- resources/views/generos.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="generos-header py-5 text-center">
    <h1 class="fw-bold">EXPLORA POR GÉNERO</h1>
    <p class="lead">¡Encuentra vinilos para tu estilo musical favorito!</p>
</div>

<div class="container mb-5">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4 text-center">
        @php
            $generos = [
                ['nombre' => 'ROCK', 'img' => 'RockBG.png'],
                ['nombre' => 'POP', 'img' => 'popBG.png'],
                ['nombre' => 'HIP HOP', 'img' => 'HipHopBG.png'],
                ['nombre' => 'R&B', 'img' => 'rnbBG.png'],
                ['nombre' => 'ELECTRÓNICA', 'img' => 'ElectronicaBG.png'],
                ['nombre' => 'JAZZ', 'img' => 'JazzBG.png'],
            ];
        @endphp

        @foreach ($generos as $genero)
        <div class="col">
            <div class="genero-card position-relative overflow-hidden rounded-4">
                <img src="{{ asset('images/generos/' . $genero['img']) }}" alt="{{ $genero['nombre'] }}" class="img-fluid">
                <div class="overlay d-flex flex-column justify-content-center align-items-center text-white">
                    <h2 class="fw-bold">{{ $genero['nombre'] }}</h2>
                    <a href="#" class="btn btn-light mt-2">Explorar</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
