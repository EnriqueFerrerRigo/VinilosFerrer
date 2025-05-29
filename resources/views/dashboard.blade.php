<!--<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
-->
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
