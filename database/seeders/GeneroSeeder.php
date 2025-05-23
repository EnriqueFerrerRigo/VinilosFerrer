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
        Genero::create([
            'nombre' => 'Rock'
        ]);

        Genero::create([
            'nombre' => 'Pop'
        ]);

        // Agregaré más géneros aquí
    }
}
