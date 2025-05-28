<?php

namespace Database\Seeders;

use App\Models\Album;
use Illuminate\Database\Seeder;

class AlbumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Album::create([
            'titulo' => 'The Dark Side of the Moon',
            'artista_id' => 1, 
            'genero_id' => 1, 
            'año' => 1973,
            'imagen' => 'dark_side_of_the_moon.jpg',
            'precio' => 20.00,
            'stock' => 100
        ]);

        Album::create([
            'titulo' => 'Abbey Road',
            'artista_id' => 2, 
            'genero_id' => 2, 
            'año' => 1969,
            'imagen' => 'abbey_road.jpg',
            'precio' => 25.00,
            'stock' => 150
        ]);

        // Agregaré más álbumes aquí
    }
}
