@extends('layouts.app')

@section('content')
<h1>Mis Favoritos</h1>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if($favoritos->isEmpty())
    <p>No tienes álbumes favoritos.</p>
@else
    <ul>
        @foreach($favoritos as $favorito)
            <li>
                {{ $favorito->album->titulo ?? 'Álbum no disponible' }}

                <form action="{{ route('favoritos.destroy', $favorito) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('¿Eliminar de favoritos?')" class="btn btn-sm btn-danger">Eliminar</button>
                </form>
            </li>
        @endforeach
    </ul>
@endif
@endsection
