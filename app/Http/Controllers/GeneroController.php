<?php

namespace App\Http\Controllers;

use App\Models\Genero;
use Illuminate\Http\Request;

class GeneroController extends Controller
{
    public function index()
    {
        $generos = Genero::all();
        return view('generos.index', compact('generos'));
    }

    public function show($id)
    {
        $genero = Genero::findOrFail($id);
        $albumes = $genero->albumes()->with('artista')->get();

        return view('generos.show', compact('genero', 'albumes'));
    }

    public function create()
    {
        return view('generos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        Genero::create($request->all());

        return redirect()->route('generos.index')->with('success', 'Género creado correctamente');
    }

    public function edit(Genero $genero)
    {
        return view('generos.edit', compact('genero'));
    }

    public function update(Request $request, Genero $genero)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        $genero->update($request->all());

        return redirect()->route('generos.index')->with('success', 'Género actualizado correctamente');
    }


    public function destroy(Genero $genero)
    {
        $genero->delete();

        return redirect()->route('generos.index')->with('success', 'Género eliminado correctamente');
    }
}
