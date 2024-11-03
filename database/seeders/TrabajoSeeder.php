<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Trabajo;
class TrabajoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Trabajo::insert([
            [
                'tipo' => 'Cosecha',
                'fecha_inicio' => '2024-05-01',
                'fecha_fin' => '2024-05-15',
                'descripcion' => 'Cosecha de maíz',
                'ubicacion' => 'Lote 1',
                'prioridad' => 'Alta',
                'cultivo_id' => 1,
                'estado' => 'Pendiente',
            ]
        ]);
    }
}
