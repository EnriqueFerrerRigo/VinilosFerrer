<?php

namespace Database\Seeders;

use App\Models\Favorito;
use App\Models\User;
use Illuminate\Database\Seeder;

class FavoritoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::find(1); // Asumiendo que el ID 1 es el Admin

        $user->favoritos()->create([
            'album_id' => 1, 
        ]);

        $user->favoritos()->create([
            'album_id' => 2, 
        ]);

        // Agregaré más favoritos aquí
    }
}
