@extends('layouts.app')

@section('title', 'Géneros')

@section('content')
<div class="container py-5">
    <h1 class="text-center fw-bold mb-3">EXPLORA POR GÉNERO</h1>
    <p class="text-center mb-4 fs-5">¡Encuentra vinilos para tu estilo musical favorito!</p>

    <div class="row g-4">
        @foreach ($generos as $genero)
        <div class="col-12 col-md-6 col-lg-4">
            <div class="genero-card position-relative text-white rounded overflow-hidden genero-{{ strtolower($genero->nombre) }}">
                <div class="overlay d-flex flex-column justify-content-center align-items-center">
                    <h2 class="genero-title fw-bold mb-3">{{ strtoupper($genero->nombre) }}</h2>
                    <a href="{{ route('generos.show', $genero->id) }}" class="btn btn-light btn-sm">Explorar</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
