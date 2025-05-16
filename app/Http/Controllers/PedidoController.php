<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PedidoController extends Controller
{
    /**
     * Mostrar listado de pedidos del usuario autenticado
     */
    public function index()
    {
        $user = Auth::user();

        // Si quieres que admin vea todos, añade lógica aquí
        $pedidos = $user->rol === 'admin' ? Pedido::all() : Pedido::where('usuario_id', $user->id)->get();

        return view('pedidos.index', compact('pedidos'));
    }

    /**
     * Mostrar formulario para crear un nuevo pedido (opcional, depende de la lógica)
     */
    public function create()
    {
        // Puedes decidir si permites crear pedido directamente o solo desde carrito, esta funcionalidad seguramente la quite
        return view('pedidos.create');
    }

    /**
     * Guardar un pedido nuevo
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'fecha' => 'required|date',
            'total' => 'required|numeric|min:0',
            // Otros campos que consideres
        ]);

        $pedido = new Pedido($validated);
        $pedido->usuario_id = Auth::id();
        $pedido->save();

        // Aquí añadiré lógica para vincular álbumes al pedido con la tabla pedidos_album

        return redirect()->route('pedidos.index')->with('success', 'Pedido creado con éxito');
    }

    /**
     * Mostrar detalles de un pedido
     */
    public function show(Pedido $pedido)
    {
        $user = Auth::user();

        // Control manual básico: solo admin o propietario pueden ver el pedido
        if ($user->rol !== 'admin' && $pedido->usuario_id !== $user->id) {
            abort(403, 'Acceso no autorizado.');
        }

        $pedido->load('pedidosAlbum.album');

        return view('pedidos.show', compact('pedido'));
    }

    /**
     * Mostrar formulario para editar un pedido
     */
    public function edit(Pedido $pedido)
    {
        $user = Auth::user();

        // Control manual básico: solo admin o propietario pueden editar el pedido
        if ($user->rol !== 'admin' && $pedido->usuario_id !== $user->id) {
            abort(403, 'Acceso no autorizado.');
        }

        return view('pedidos.edit', compact('pedido'));
    }

    /**
     * Actualizar un pedido
     */
    public function update(Request $request, Pedido $pedido)
    {
        $user = Auth::user();

        // Control manual básico: solo admin o propietario pueden actualizar el pedido
        if ($user->rol !== 'admin' && $pedido->usuario_id !== $user->id) {
            abort(403, 'Acceso no autorizado.');
        }

        $validated = $request->validate([
            'fecha' => 'required|date',
            'total' => 'required|numeric|min:0',
        ]);

        $pedido->update($validated);

        return redirect()->route('pedidos.index')->with('success', 'Pedido actualizado');
    }

    /**
     * Borrar un pedido
     */
    public function destroy(Pedido $pedido)
    {
        $user = Auth::user();

        // Control manual básico: solo admin o propietario pueden borrar el pedido
        if ($user->rol !== 'admin' && $pedido->usuario_id !== $user->id) {
            abort(403, 'Acceso no autorizado.');
        }

        $pedido->delete();

        return redirect()->route('pedidos.index')->with('success', 'Pedido eliminado');
    }
    public function crearDesdeCarrito()
{
    $usuario_id = auth()->id();

    // Obtener items del carrito
    $items = CarritoTemporal::where('usuario_id', $usuario_id)->get();

    if ($items->isEmpty()) {
        return redirect()->route('carrito.index')->with('error', 'El carrito está vacío.');
    }

    // Calcular total
    $total = 0;
    foreach ($items as $item) {
        $total += $item->cantidad * $item->album->precio;
    }

    // Crear pedido
    $pedido = Pedido::create([
        'usuario_id' => $usuario_id,
        'fecha' => now(),
        'total' => $total,
        'estado' => 'Pendiente', 
    ]);

    // Crear registros en pedidos_album
    foreach ($items as $item) {
        $pedido->pedidosAlbum()->create([
            'album_id' => $item->album_id,
            'cantidad' => $item->cantidad,
            'precio_unitario' => $item->album->precio,
        ]);
    }

    // Vaciar carrito
    CarritoTemporal::where('usuario_id', $usuario_id)->delete();

    return redirect()->route('pedidos.index')->with('success', 'Pedido realizado con éxito.');
}

}
