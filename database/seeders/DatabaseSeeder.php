<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Crear usuario de prueba
        User::factory()->create([
            'name' => 'Admin Fiesta Bolivia',
            'email' => 'admin@fiestabolivia.com',
        ]);

        // Llamar al seeder de datos de prueba
        $this->call(DatosPruebaSeeder::class);
    }
}
