@extends('layouts.app')

@section('title', 'Registro')

@section('content')
<div class="d-flex justify-content-center align-items-center" style="min-height: 80vh;">
  <form method="POST" action="{{ route('register') }}" class="p-4 shadow rounded" style="width: 320px; background-color: #f8f9fa;">
    @csrf
    <h3 class="mb-4 text-center fw-bold">Registro</h3>

    <div class="mb-3">
      <label for="name" class="form-label fw-semibold">Nombre completo</label>
      <input id="name" type="text" name="name" class="form-control" value="{{ old('name') }}" required autofocus>
      @error('name')
        <span class="text-danger small">{{ $message }}</span>
      @enderror
    </div>

    <div class="mb-3">
      <label for="email" class="form-label fw-semibold">Correo electrónico</label>
      <input id="email" type="email" name="email" class="form-control" value="{{ old('email') }}" required>
      @error('email')
        <span class="text-danger small">{{ $message }}</span>
      @enderror
    </div>

    <div class="mb-3">
      <label for="password" class="form-label fw-semibold">Contraseña</label>
      <input id="password" type="password" name="password" class="form-control" required autocomplete="new-password">
      @error('password')
        <span class="text-danger small">{{ $message }}</span>
      @enderror
    </div>

    <div class="mb-4">
      <label for="password_confirmation" class="form-label fw-semibold">Confirmar contraseña</label>
      <input id="password_confirmation" type="password" name="password_confirmation" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-dark w-100">Registrar</button>
    <p class="mt-3 text-center">¿Ya tienes cuenta? <a href="{{ route('login') }}">Inicia sesión aquí</a></p>
  </form>
</div>
@endsection
