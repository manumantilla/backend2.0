<?php

namespace Database\Seeders;

use Iluminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\Cultivo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class CultivoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
       Cultivo::insert([
        [
            'nombre' => 'Maiz Manzano - Sem:123',
            'fecha_siembra' => '2024-01-01',
            'fecha_cosecha' => '2024-06-01',
            'area' => 100,
            'estado' => 'Activo',
            'gasto' => 5000,
            'latitude' => '6.2442',
            'longitude' => '-75.5812',
            'foto' => 'foto_cultivo.jpg',
            'bultos_abono' => 50,
            'semilla' => 'Maíz',
            'etapa' => 'desplante',
            'rendimiento' => 200,
            'ph' => 6.5,
            'tratamiento' => 'Tratamiento de plagas',
        ],
        ]);
    }
}
