<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ClientUserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Cliente',
            'email' => 'cliente@vinilos.com',
            'password' => Hash::make('cliente123'),
            'rol' => 'cliente'
        ]);
    }
}
