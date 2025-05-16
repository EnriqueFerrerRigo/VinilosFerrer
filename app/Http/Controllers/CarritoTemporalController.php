<?php

namespace App\Http\Controllers;

use App\Models\CarritoTemporal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarritoTemporalController extends Controller
{
    public function add(Request $request)
    {
        $userId = Auth::id();
        $albumId = $request->album_id;

        $item = CarritoTemporal::where('usuario_id', $userId)
            ->where('album_id', $albumId)
            ->first();

        if ($item) {
            $item->cantidad += 1;
            $item->save();
        } else {
            CarritoTemporal::create([
                'usuario_id' => $userId,
                'album_id' => $albumId,
                'cantidad' => 1,
            ]);
        }

        return back()->with('success', 'Álbum añadido al carrito.');
    }

    public function index()
    {
        $userId = Auth::id();
        $carrito = CarritoTemporal::with('album')->where('usuario_id', $userId)->get();

        return view('carrito.index', compact('carrito'));
    }

    public function update(Request $request, $id)
    {
        $item = CarritoTemporal::findOrFail($id);
        $item->cantidad = $request->cantidad;
        $item->save();

        return back()->with('success', 'Cantidad actualizada.');
    }

    public function destroy($id)
    {
        $item = CarritoTemporal::findOrFail($id);
        $item->delete();

        return back()->with('success', 'Artículo eliminado del carrito.');
    }
}
