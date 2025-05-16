@extends('layouts.app')

@section('content')
<h1>Editar Género</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('generos.update', $genero) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" class="form-control" value="{{ old('nombre', $genero->nombre) }}" required>
    </div>

    <button type="submit" class="btn btn-primary mt-2">Actualizar</button>
</form>
@endsection
