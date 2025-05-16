<?php

namespace App\Http\Controllers;

use App\Models\Favorito;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoritoController extends Controller
{
    public function index()
    {
        $favoritos = Favorito::where('usuario_id', Auth::id())->with('album')->get();
        return view('favoritos.index', compact('favoritos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'album_id' => 'required|exists:albumes,id',
        ]);

        Favorito::create([
            'usuario_id' => Auth::id(),
            'album_id' => $request->album_id,
        ]);

        return back()->with('success', 'Álbum añadido a favoritos');
    }

    public function destroy(Favorito $favorito)
    {
        // Solo el usuario dueño puede eliminar
        if ($favorito->usuario_id !== Auth::id()) {
            abort(403, 'Acceso no autorizado');
        }

        $favorito->delete();

        return back()->with('success', 'Álbum eliminado de favoritos');
    }
}
