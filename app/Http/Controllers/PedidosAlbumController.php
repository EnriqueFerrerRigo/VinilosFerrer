<?php

namespace App\Http\Controllers;

use App\Models\PedidosAlbum;
use App\Models\Album;
use App\Models\Pedido;
use Illuminate\Http\Request;

class PedidosAlbumController extends Controller
{
    // Listar detalles de pedidos
    public function index()
    {
        $detalles = PedidosAlbum::with(['pedido', 'album'])->get();
        return view('pedidos_album.index', compact('detalles'));
    }

    // Formulario para crear nuevo detalle de pedido
    public function create()
    {
        $pedidos = Pedido::all();
        $albums = Album::all();
        return view('pedidos_album.create', compact('pedidos', 'albums'));
    }

    // Guardar nuevo detalle
    public function store(Request $request)
    {
        $validated = $request->validate([
            'pedido_id' => 'required|exists:pedidos,id',
            'album_id' => 'required|exists:albumes,id',
            'cantidad' => 'required|integer|min:1',
            'precio_unitario' => 'required|numeric|min:0',
        ]);

        PedidosAlbum::create($validated);

        return redirect()->route('pedidos_album.index')->with('success', 'Detalle de pedido creado correctamente.');
    }

    // Mostrar detalle (opcional)
    public function show(PedidosAlbum $pedidosAlbum)
    {
        return view('pedidos_album.show', compact('pedidosAlbum'));
    }

    // Formulario para editar detalle
    public function edit(PedidosAlbum $pedidosAlbum)
    {
        $pedidos = Pedido::all();
        $albums = Album::all();
        return view('pedidos_album.edit', compact('pedidosAlbum', 'pedidos', 'albums'));
    }

    // Actualizar detalle
    public function update(Request $request, PedidosAlbum $pedidosAlbum)
    {
        $validated = $request->validate([
            'pedido_id' => 'required|exists:pedidos,id',
            'album_id' => 'required|exists:albumes,id',
            'cantidad' => 'required|integer|min:1',
            'precio_unitario' => 'required|numeric|min:0',
        ]);

        $pedidosAlbum->update($validated);

        return redirect()->route('pedidos_album.index')->with('success', 'Detalle de pedido actualizado correctamente.');
    }

    // Eliminar detalle
    public function destroy(PedidosAlbum $pedidosAlbum)
    {
        $pedidosAlbum->delete();

        return redirect()->route('pedidos_album.index')->with('success', 'Detalle de pedido eliminado correctamente.');
    }
}
