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
            ArtistaSeeder::class,
            GeneroSeeder::class,
            AlbumSeeder::class,
            CancionSeeder::class,
            AdminUserSeeder::class,
            ClientUserSeeder::class,
            FavoritoSeeder::class,
            PedidoSeeder::class,
            PedidosAlbumSeeder::class
        ]);
    }
}
