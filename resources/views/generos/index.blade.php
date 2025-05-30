@extends('layouts.app')

@section('title', 'Géneros')

@section('content')
<div class="generos-body">
    <div class="container py-5 generos-header">
        <h1 class="text-center fw-bold mb-3">EXPLORA POR GÉNERO</h1>
        <p class="text-center mb-4 fs-5">¡Encuentra vinilos para tu estilo musical favorito!</p>

        @auth
            @if(auth()->user()->rol === 'admin')
                <div class="text-center mb-4">
                    <a href="{{ route('generos.create') }}" class="btn btn-primary">Crear nuevo género</a>
                </div>
            @endif
        @endauth
    </div>

    <div class="container">
        <div class="row g-4">
            @foreach ($generos as $genero)
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="genero-card position-relative text-white rounded overflow-hidden"
                         style="background-image: url('{{ asset('storage/generos/' . $genero->imagen) }}'); background-size: cover; background-position: center;">
                        <div class="overlay d-flex flex-column justify-content-center align-items-center">
                            <h2 class="genero-title fw-bold mb-3">{{ strtoupper($genero->nombre) }}</h2>
                            <a href="{{ route('generos.show', $genero->id) }}" class="btn btn-light btn-sm">Explorar</a>

                            @auth
                                @if(auth()->user()->rol === 'admin')
                                    <div class="mt-3">
                                        <a href="{{ route('generos.edit', $genero) }}" class="btn btn-sm btn-warning">Editar</a>

                                        <form action="{{ route('generos.destroy', $genero) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('¿Seguro que quieres eliminar?')" class="btn btn-sm btn-danger">Eliminar</button>
                                        </form>
                                    </div>
                                @endif
                            @endauth
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
