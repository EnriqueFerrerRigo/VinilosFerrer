<?php

namespace App\Http\Controllers;

// Importamos los modelos Album y Cancion para poder usarlos en el controlador
use App\Models\Album;
use App\Models\Cancion;
use Illuminate\Http\Request;

class CancionController extends Controller
{
    /**
     * Mostrar el listado de todas las canciones
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Obtenemos todas las canciones con su álbum relacionado (eager loading)
        $canciones = Cancion::with('album')->get();

        // Retornamos la vista 'canciones.index' pasando las canciones
        return view('canciones.index', compact('canciones'));
    }

    /**
     * Mostrar el formulario para crear una nueva canción
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // Obtenemos todos los álbumes para mostrarlos en el select del formulario
        $albums = Album::all();

        // Retornamos la vista 'canciones.create' pasando los álbumes
        return view('canciones.create', compact('albums'));
    }

    /**
     * Guardar la canción creada en la base de datos
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validamos los datos enviados desde el formulario
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',           // Título obligatorio, cadena, máximo 255 caracteres
            'album_id' => 'required|exists:albumes,id',      // El álbum debe existir en la tabla 'albumes'
            'duracion' => 'required|integer|min:1',          // Duración obligatoria, entero mínimo 1 segundo
        ]);

        // Creamos la canción en la base de datos con los datos validados
        Cancion::create($validated);

        // Redirigimos a la lista de canciones con un mensaje de éxito en la sesión
        return redirect()->route('canciones.index')->with('success', 'Canción creada correctamente.');
    }

    /**
     * Mostrar el formulario para editar una canción existente
     *
     * @param  \App\Models\Cancion  $cancion
     * @return \Illuminate\View\View
     */
    public function edit(Cancion $cancion)
    {
        // Obtenemos todos los álbumes para mostrarlos en el select del formulario
        $albums = Album::all();

        // Retornamos la vista 'canciones.edit' con la canción y los álbumes
        return view('canciones.edit', compact('cancion', 'albums'));
    }

    /**
     * Actualizar la canción en la base de datos con los nuevos datos
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cancion  $cancion
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Cancion $cancion)
    {
        // Validamos los datos del formulario
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'album_id' => 'required|exists:albumes,id',
            'duracion' => 'required|integer|min:1',
        ]);

        // Actualizamos la canción con los datos validados
        $cancion->update($validated);

        // Redirigimos a la lista de canciones con mensaje de éxito
        return redirect()->route('canciones.index')->with('success', 'Canción actualizada correctamente.');
    }

    /**
     * Eliminar una canción de la base de datos
     *
     * @param  \App\Models\Cancion  $cancion
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Cancion $cancion)
    {
        // Eliminamos la canción
        $cancion->delete();

        // Redirigimos a la lista de canciones con mensaje de éxito
        return redirect()->route('canciones.index')->with('success', 'Canción eliminada correctamente.');
    }
}
