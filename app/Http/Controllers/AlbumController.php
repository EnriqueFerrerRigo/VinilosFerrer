<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function index()
    {
        // Traemos todos los álbumes con su artista y género para optimizar consultas
        $albums = Album::with(['artista', 'genero'])->get();

        // Devolvemos la vista con la variable albums
        return view('albums.index', compact('albums'));

    }

    // Luego añadiremos los métodos create, store, edit, update y destroy



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Necesitamos pasar los artistas y géneros para los select del formulario
        $artistas = \App\Models\Artista::all();
        $generos = \App\Models\Genero::all();

        return view('albums.create', compact('artistas', 'generos'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos recibidos
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'artista_id' => 'required|exists:artistas,id',
            'genero_id' => 'required|exists:generos,id',
            'anio' => 'required|digits:4|integer|min:1900|max:' . date('Y'),
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'imagen' => 'nullable|image|max:2048', // archivo imagen opcional max 2MB
        ]);

        // Procesar la imagen si se subió archivo
        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $path = $file->store('public/albumes'); // guarda en storage/app/public/albumes
            $validated['imagen'] = str_replace('public/', 'storage/', $path); // para usar en la vista
        }

        // Crear el álbum con los datos validados
        \App\Models\Album::create($validated);

        // Redirigir a la lista con mensaje de éxito
        return redirect()->route('albums.index')->with('success', 'Álbum creado correctamente.');
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
    public function edit(Album $album)
    {
        $artistas = \App\Models\Artista::all();
        $generos = \App\Models\Genero::all();

        return view('albums.edit', compact('album', 'artistas', 'generos'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Album $album)
    {
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'artista_id' => 'required|exists:artistas,id',
            'genero_id' => 'required|exists:generos,id',
            'anio' => 'required|digits:4|integer|min:1900|max:' . date('Y'),
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'imagen' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $path = $file->store('public/albumes');
            $validated['imagen'] = str_replace('public/', 'storage/', $path);
        }

        $album->update($validated);

        return redirect()->route('albums.index')->with('success', 'Álbum actualizado correctamente.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Album $album)
    {
        $album->delete();

        return redirect()->route('albums.index')->with('success', 'Álbum eliminado correctamente.');
    }

}
