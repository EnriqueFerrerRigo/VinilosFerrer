<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\CancionController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\PedidosAlbumController;
use App\Http\Controllers\CarritoTemporalController;
use App\Http\Controllers\ArtistaController;


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


Route::get('/', function () {
    return view('welcome');
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

use App\Http\Controllers\ArtistaController;

Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::resource('artistas', ArtistaController::class);
});


/*Route::get('/test-admin', function () {
    return auth()->check() ? auth()->user()->rol : 'No autenticado';
});
*/
/*Route::get('/test-admin', function () {
    return 'Middleware isAdmin funciona';
})->middleware(['auth', 'isAdmin']);
*/