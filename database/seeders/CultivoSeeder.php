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
        [
            'nombre' => 'Maíz Manzano - Sem:123',
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
        [
            'nombre' => 'Arroz Superior - Sem:456',
            'fecha_siembra' => '2024-02-15',
            'fecha_cosecha' => '2024-08-15',
            'area' => 150,
            'estado' => 'Activo',
            'gasto' => 7500,
            'latitude' => '5.3214',
            'longitude' => '-75.1234',
            'foto' => 'foto_arroz.jpg',
            'bultos_abono' => 80,
            'semilla' => 'Arroz',
            'etapa' => 'semillero',
            'rendimiento' => 180,
            'ph' => 7.0,
            'tratamiento' => 'Fertilización y control de maleza',
        ],
        [
            'nombre' => 'Frijol Rojo - Sem:789',
            'fecha_siembra' => '2024-03-05',
            'fecha_cosecha' => '2024-05-10',
            'area' => 50,
            'estado' => 'Inactivo',
            'gasto' => 2000,
            'latitude' => '6.5123',
            'longitude' => '-75.3012',
            'foto' => 'foto_frijol.jpg',
            'bultos_abono' => 30,
            'semilla' => 'Frijol',
            'etapa' => 'cosecha',
            'rendimiento' => 120,
            'ph' => 6.0,
            'tratamiento' => 'Control de enfermedades y riego',
        ],
        [
            'nombre' => 'Café Orgánico - Sem:111',
            'fecha_siembra' => '2024-01-20',
            'fecha_cosecha' => '2024-11-10',
            'area' => 200,
            'estado' => 'Activo',
            'gasto' => 12000,
            'latitude' => '5.6721',
            'longitude' => '-75.8456',
            'foto' => 'foto_cafe.jpg',
            'bultos_abono' => 120,
            'semilla' => 'Café',
            'etapa' => 'enraizamiento',
            'rendimiento' => 300,
            'ph' => 6.2,
            'tratamiento' => 'Tratamiento de plagas y fertilización',
        ],
        [
            'nombre' => 'Tomate Cherry - Sem:234',
            'fecha_siembra' => '2024-03-10',
            'fecha_cosecha' => '2024-06-30',
            'area' => 75,
            'estado' => 'Activo',
            'gasto' => 3500,
            'latitude' => '6.2134',
            'longitude' => '-75.6789',
            'foto' => 'foto_tomate.jpg',
            'bultos_abono' => 25,
            'semilla' => 'Tomate',
            'etapa' => 'engrosamiento',
            'rendimiento' => 150,
            'ph' => 6.8,
            'tratamiento' => 'Fertilización y control de plagas',
        ],
        [
            'nombre' => 'Plátano Maduro - Sem:999',
            'fecha_siembra' => '2024-02-01',
            'fecha_cosecha' => '2024-09-15',
            'area' => 120,
            'estado' => 'Activo',
            'gasto' => 4000,
            'latitude' => '5.8765',
            'longitude' => '-75.9654',
            'foto' => 'foto_platano.jpg',
            'bultos_abono' => 60,
            'semilla' => 'Plátano',
            'etapa' => 'engrosamiento',
            'rendimiento' => 250,
            'ph' => 6.3,
            'tratamiento' => 'Control de enfermedades y fertilización',
        ],
        [
            'nombre' => 'Papa Pastusa - Sem:888',
            'fecha_siembra' => '2024-04-10',
            'fecha_cosecha' => '2024-07-20',
            'area' => 60,
            'estado' => 'Activo',
            'gasto' => 3500,
            'latitude' => '6.4210',
            'longitude' => '-75.7621',
            'foto' => 'foto_papa.jpg',
            'bultos_abono' => 40,
            'semilla' => 'Papa',
            'etapa' => 'desplante',
            'rendimiento' => 220,
            'ph' => 6.0,
            'tratamiento' => 'Fertilización y control de plagas',
        ]
        ]);
    }
}
