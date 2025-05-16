<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artista;


class ArtistaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // Método para listar todos los artistas
    public function index()
    {
        $artistas = Artista::all();  // Trae todos los artistas de la BD
        return view('artistas.index', compact('artistas')); // Muestra la vista con los datos
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('artistas.create'); // Muestra el formulario para crear un artista
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            // Validar los datos recibidos
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'bio' => 'nullable|string',
            'imagen' => 'nullable|image|max:2048', // archivo de imagen opcional, max 2MB
        ]);

        // Procesar la imagen si se subió archivo
        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $path = $file->store('public/artistas'); // guarda en storage/app/public/artistas
            $validated['imagen'] = str_replace('public/', 'storage/', $path); // para usar en la vista
        }

        // Crear el artista con los datos validados
        \App\Models\Artista::create($validated);

        // Redirigir a la lista de artistas con mensaje de éxito
        return redirect()->route('artistas.index')->with('success', 'Artista creado correctamente.');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Artista $artista)
    {
        return view('artistas.edit', compact('artista'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Artista $artista)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'bio' => 'nullable|string',
            'imagen' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $path = $file->store('public/artistas');
            $validated['imagen'] = str_replace('public/', 'storage/', $path);
        }

        $artista->update($validated);

        return redirect()->route('artistas.index')->with('success', 'Artista actualizado correctamente.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Artista $artista)
    {
        $artista->delete();

        return redirect()->route('artistas.index')->with('success', 'Artista eliminado correctamente.');
    }

}
