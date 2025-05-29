<?php
/**
 * Seeder personalizado para poblar la base de datos con artistas y álbumes iniciales.
 *
 * Este seeder busca primero los géneros existentes en la base de datos (por nombre),
 * para poder asociarlos correctamente con los álbumes que se van a insertar.
 *
 * A continuación, se crean varios artistas con nombres representativos,
 * y finalmente se insertan sus respectivos álbumes,
 * cada uno enlazado con su artista y género correspondiente.
 *
 * También se establecen otros datos relevantes como año de publicación, precio,
 * stock disponible e imagen de portada (ruta relativa dentro de /storage).
 *
 * Este seeder garantiza la integridad referencial evitando IDs fijos,
 * y permite que al cargar la base de datos por primera vez,
 * ya existan álbumes reales visibles desde el frontend.
 */

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Artista;
use App\Models\Album;
use App\Models\Genero;


class ArtistaAlbumSeeder extends Seeder
{
    public function run()
    {
        // Buscar géneros por nombre
        $rock = Genero::where('nombre', 'Rock')->first();
        $pop = Genero::where('nombre', 'Pop')->first();
        $jazz = Genero::where('nombre', 'Jazz')->first();

        // Crear artistas
        $james = Artista::create(['nombre' => 'James Hollow']);
        $pinkFloyd = Artista::create(['nombre' => 'Pink Floyd']);
        $beatles = Artista::create(['nombre' => 'The Beatles']);

        // Crear álbumes
        Album::create([
            'titulo' => 'Running Away',
            'artista_id' => $james->id,
            'genero_id' => $jazz->id, // o $jazz->id si prefieres
            'año' => 2005,
            'imagen' => 'storage/albumes/JamesHollowVinilo.png',
            'precio' => 15.00,
            'stock' => 100
        ]);

        Album::create([
            'titulo' => 'The Dark Side of the Moon',
            'artista_id' => $pinkFloyd->id,
            'genero_id' => $rock->id,
            'año' => 1973,
            'imagen' => 'storage/albumes/dark_side_of_the_moon.jpg',
            'precio' => 20.00,
            'stock' => 100
        ]);

        Album::create([
            'titulo' => 'Abbey Road',
            'artista_id' => $beatles->id,
            'genero_id' => $pop->id,
            'año' => 1969,
            'imagen' => 'storage/albumes/abbey_road.jpg',
            'precio' => 25.00,
            'stock' => 150
        ]);
    }
}
