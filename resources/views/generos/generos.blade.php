@extends('layouts.app')

@section('title', 'Géneros')

@section('content')
<h2 class="mb-4 text-center fw-bold">Géneros</h2>
<div class="row row-cols-1 row-cols-md-3 g-4">
  @foreach($generos as $genero)
    <div class="col">
      <div class="card h-100 text-center shadow-sm">
        <div class="card-body d-flex flex-column justify-content-center">
          <h5 class="card-title">{{ $genero->nombre }}</h5>
        </div>
      </div>
    </div>
  @endforeach
</div>
@endsection
