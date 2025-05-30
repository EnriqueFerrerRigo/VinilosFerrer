<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\CancionController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\PedidosAlbumController;
use App\Http\Controllers\CarritoTemporalController;
use App\Http\Controllers\ArtistaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\GeneroController;
use App\Http\Controllers\FavoritoController;
use Illuminate\Support\Facades\Auth;

// Ruta pública para mostrar un género
Route::get('/generos/{id}', [GeneroController::class, 'show'])->name('generos.show');


Route::get('/albums/catalogo', [AlbumController::class, 'catalogo'])->name('albums.catalogo');

// Rutas para Géneros (CRUD completo)
Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::resource('generos', GeneroController::class);
});

Route::post('/carrito/agregar-ajax', [CarritoTemporalController::class, 'agregarViaAjax'])->name('carrito.agregar.ajax');

Route::get('/carrito/contador', function () {
    $userId = Auth::id();
    $total = \App\Models\CarritoTemporal::where('usuario_id', $userId)->sum('cantidad');
    return response()->json(['total' => $total]);
})->middleware('auth');


Route::post('/carrito/agregar-ajax', [CarritoTemporalController::class, 'agregarViaAjax'])
    ->middleware('auth')
    ->name('carrito.agregar.ajax');


// Rutas para Favoritos (usuario autenticado)
Route::middleware('auth')->group(function () {
    Route::get('favoritos', [FavoritoController::class, 'index'])->name('favoritos.index');
    Route::post('favoritos', [FavoritoController::class, 'store'])->name('favoritos.store');
    Route::delete('favoritos/{favorito}', [FavoritoController::class, 'destroy'])->name('favoritos.destroy');
});
// Ruta pública para home
Route::get('/', [HomeController::class, 'index'])->name('home');

// Rutas públicas para géneros y álbumes (frontend)
Route::get('/generos', [GeneroController::class, 'index'])->name('generos.index');
Route::get('/albumes', [AlbumController::class, 'index'])->name('albumes.index');

Route::get('/artistas', [ArtistaController::class, 'index'])->name('artistas.index');

Route::middleware('auth')->group(function () {
    Route::get('/carrito', [CarritoTemporalController::class, 'index'])->name('carrito.index');
    Route::post('/carrito', [CarritoTemporalController::class, 'store'])->name('carrito.store');
    Route::patch('/carrito/{carrito}', [CarritoTemporalController::class, 'update'])->name('carrito.update');
    Route::delete('/carrito/{carrito}', [CarritoTemporalController::class, 'destroy'])->name('carrito.destroy');
});

Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::resource('pedidos_album', PedidosAlbumController::class);
});

Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::resource('canciones', CancionController::class);
});

Route::middleware(['auth'])->group(function () {
    Route::resource('pedidos', PedidoController::class);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/admin', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
});

Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::resource('artistas', ArtistaController::class);
});

