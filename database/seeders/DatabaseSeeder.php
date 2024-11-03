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
        $this->call([
            CultivoSeeder::class,
            EmpleadoSeeder::class,
            GastoSeeder::class,
            manuelito_animales::class,
            manuelito_backend::class,
            TrabajoSeeder::class,
            EmpleadoTrabajoSeeder::class,

        ]);
        User::factory()->create([
            'name' => 'Manuelito',
            'email' => 'manuelito@gmail.com',
            'type' => 'admin',
            'password' => 'qwerty123',
        ]);
    }
}
