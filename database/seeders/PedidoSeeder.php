<?php
namespace Database\Seeders;

use App\Models\Pedido;
use App\Models\User;
use Illuminate\Database\Seeder;

class PedidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pedido::create([
            'usuario_id' => 1, // El ID del Admin
            'fecha' => now(),
            'total' => 50.00,
            'estado' => 'Pendiente'
        ]);

        Pedido::create([
            'usuario_id' => 2, // El ID de un Cliente
            'fecha' => now(),
            'total' => 30.00,
            'estado' => 'Enviado'
        ]);
    }
}


