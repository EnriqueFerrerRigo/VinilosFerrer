
{{-- resources/views/dashboard.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container text-center py-5">
    <h1 class="fw-bold">¡Hola, {{ Auth::user()->name }}!</h1>
    <p class="fs-5 text-muted">Bienvenido a tu dashboard</p>

    <div class="d-flex justify-content-center gap-3 mt-4">
        <a href="{{ route('home') }}" class="btn btn-outline-dark px-4 py-2 fw-semibold">Ir al Home</a>
        <a href="{{ route('pedidos.index') }}" class="btn btn-outline-dark px-4 py-2 fw-semibold">Ver pedidos</a>
    </div>
</div>
@endsection
