{{-- resources/views/catalogo.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container text-center py-5">
    <h1 class="fw-bold">CATÁLOGO DE ÁLBUMES</h1>
    <p class="lead">Explora todos los vinilos disponibles.</p>

    <div class="d-flex flex-wrap justify-content-center gap-3 my-4">
        <select class="form-select w-auto">
            <option selected>Género</option>
            <option value="rock">Rock</option>
            <option value="pop">Pop</option>
        </select>

        <select class="form-select w-auto">
            <option selected>Precio</option>
            <option value="asc">Menor a mayor</option>
            <option value="desc">Mayor a menor</option>
        </select>

        <select class="form-select w-auto">
            <option selected>Ordenar por</option>
            <option value="popularidad">Popularidad</option>
            <option value="nuevos">Nuevos</option>
        </select>

        <input type="search" class="form-control w-auto" placeholder="Buscar">
    </div>

    <div class="album-grid d-grid gap-4 justify-content-center">
        @php
            $albumes = [
                ['titulo' => 'Velvet Dreams', 'imagen' => 'velvet-dreams.jpg'],
                ['titulo' => 'Endless Summer', 'imagen' => 'endless-summer.jpg'],
                ['titulo' => 'Enchanted Woods', 'imagen' => 'enchanted-woods.jpg'],
                ['titulo' => 'Strangers Tonight', 'imagen' => 'strangers-tonight.jpg'],
                ['titulo' => 'City Lights', 'imagen' => 'city-lights.jpg'],
                ['titulo' => 'Solitary', 'imagen' => 'solitary.jpg'],
                ['titulo' => 'After Hours', 'imagen' => 'after-hours.jpg'],
            ];
        @endphp

        @foreach ($albumes as $album)
        <div class="album-cover">
            <img src="{{ asset('images/albums/' . $album['imagen']) }}" alt="{{ $album['titulo'] }}" class="img-fluid rounded">
        </div>
        @endforeach
    </div>
</div>
@endsection
