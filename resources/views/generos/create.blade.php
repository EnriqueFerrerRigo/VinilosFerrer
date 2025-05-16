@extends('layouts.app')

@section('content')
<h1>Crear Género</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('generos.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" class="form-control" value="{{ old('nombre') }}" required>
    </div>

    <button type="submit" class="btn btn-primary mt-2">Guardar</button>
</form>
@endsection
