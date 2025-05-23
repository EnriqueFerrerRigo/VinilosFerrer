<?php

namespace Database\Seeders;

use App\Models\PedidosAlbum;
use Illuminate\Database\Seeder;

class PedidosAlbumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PedidosAlbum::create([
            'pedido_id' => 1, // El ID del primer pedido
            'album_id' => 1,  // El ID del primer álbum
            'cantidad' => 1,
            'precio_unitario' => 20.00
        ]);

        PedidosAlbum::create([
            'pedido_id' => 2, // El ID del segundo pedido
            'album_id' => 2,  // El ID del segundo álbum
            'cantidad' => 2,
            'precio_unitario' => 15.00
        ]);

        // Agregaré más registros de detalles de pedidos aquí
    }
}
