<?php

namespace Database\Seeders;

use App\Models\Cancion;
use Illuminate\Database\Seeder;

class CancionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cancion::create([
            'album_id' => 1,
            'titulo' => 'Speak to Me',
            'duracion' => 150
        ]);

        Cancion::create([
            'album_id' => 2,
            'titulo' => 'Come Together',
            'duracion' => 260
        ]);

        // Agregaré más canciones aquí
    }
}
