@extends('layouts.app')

@section('title', 'Álbumes')

@section('content')
<h2 class="mb-4 text-center fw-bold">Álbumes</h2>
<div class="row row-cols-1 row-cols-md-4 g-4">
  @foreach($albums as $album)
    <div class="col">
      <div class="card h-100 shadow-sm">
        <img src="{{ asset($album->imagen ?? 'storage/albumes/default.jpg') }}" class="card-img-top" alt="{{ $album->titulo }}">
        <div class="card-body">
          <h5 class="card-title">{{ $album->titulo }}</h5>
          <p class="card-text">Artista: {{ $album->artista->nombre }}</p>
          <p class="card-text">Género: {{ $album->genero->nombre }}</p>
          <p class="card-text fw-bold">Precio: {{ number_format($album->precio, 2, ',', '.') }} €</p>
          <button class="btn btn-primary w-100 agregar-al-carrito" data-id="{{ $album->id }}">
            Añadir al carrito
          </button>
        </div>
      </div>
    </div>
  @endforeach
</div>
@endsection
