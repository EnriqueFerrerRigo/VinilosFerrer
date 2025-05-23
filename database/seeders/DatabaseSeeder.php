<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void{
        $this->call([
            AdminUserSeeder::class,
            ClientUserSeeder::class,
            ArtistaSeeder::class,
            AlbumSeeder::class,
            CancionSeeder::class,
            GeneroSeeder::class,
            FavoritoSeeder::class,
            PedidoSeeder::class,
            PedidosAlbumSeeder::class
        ]);
    }
}
