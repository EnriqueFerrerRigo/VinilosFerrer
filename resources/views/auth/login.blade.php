@extends('layouts.app')

@section('title', 'Iniciar Sesión')

@section('content')
<div class="d-flex justify-content-center align-items-center" style="min-height: 80vh;">
  <form method="POST" action="{{ route('login') }}" class="p-4 shadow rounded" style="width: 320px; background-color: #f8f9fa;">
    @csrf
    <h3 class="mb-4 text-center fw-bold">Iniciar Sesión</h3>

    <div class="mb-3">
      <label for="email" class="form-label fw-semibold">Correo electrónico</label>
      <input id="email" type="email" name="email" class="form-control" value="{{ old('email') }}" required autofocus>
      @error('email')
        <span class="text-danger small">{{ $message }}</span>
      @enderror
    </div>

    <div class="mb-4">
      <label for="password" class="form-label fw-semibold">Contraseña</label>
      <input id="password" type="password" name="password" class="form-control" required autocomplete="current-password">
      @error('password')
        <span class="text-danger small">{{ $message }}</span>
      @enderror
    </div>

    <button type="submit" class="btn btn-dark w-100">Entrar</button>
    <p class="mt-3 text-center">¿No tienes cuenta? <a href="{{ route('register') }}">Regístrate aquí</a></p>
  </form>
</div>
@endsection
