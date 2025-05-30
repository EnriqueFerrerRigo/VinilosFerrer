<?php

namespace Database\Seeders;

use App\Models\Genero;
use Illuminate\Database\Seeder;

class GeneroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Genero::create(['nombre' => 'Rock', 'imagen' => 'RockBG.png']);
        Genero::create(['nombre' => 'Pop', 'imagen' => 'popBG.png']);
        Genero::create(['nombre' => 'Jazz', 'imagen' => 'JazzBG.png']);
        Genero::create(['nombre' => 'Hip Hop', 'imagen' => 'HiphopBG.png']);
        Genero::create(['nombre' => 'Electrónica', 'imagen' => 'Electronica.png']);
        Genero::create(['nombre' => 'R&B', 'imagen' => 'rnbBG.png']);

    }
}
