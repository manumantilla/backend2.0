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
            ],
            [
                'cultivo_id' => 2, // Asumiendo que este cultivo tiene ID 2
                'tipo' => 'fertilizacion inicial',
                'fecha_inicio' => '2024-02-15',
                'fecha_fin' => '2024-02-20',
                'descripcion' => 'Aplicación de fertilizante para mejorar el suelo antes de la siembra del arroz.',
                'ubicacion' => 'Finca Los Andes - Sector 2',
                'estado' => 'en_trabajo',
                'prioridad' => 'alta',
            ],
            [
                'cultivo_id' => 3, // Asumiendo que este cultivo tiene ID 3
                'tipo' => 'riego',
                'fecha_inicio' => '2024-03-01',
                'fecha_fin' => '2024-03-02',
                'descripcion' => 'Riego de los frijoles durante el ciclo de crecimiento.',
                'ubicacion' => 'Finca El Paraíso - Sector 3',
                'estado' => 'pendiente',
                'prioridad' => 'media',
            ],
            [
                'cultivo_id' => 4, // Asumiendo que este cultivo tiene ID 4
                'tipo' => 'cosecha',
                'fecha_inicio' => '2024-06-01',
                'fecha_fin' => '2024-06-10',
                'descripcion' => 'Cosecha de los frutos maduros de café.',
                'ubicacion' => 'Finca Los Cafetos - Sector 4',
                'estado' => 'pendiente',
                'prioridad' => 'alta',
            ],
            [
                'cultivo_id' => 5, // Asumiendo que este cultivo tiene ID 5
                'tipo' => 'post-cosecha',
                'fecha_inicio' => '2024-07-01',
                'fecha_fin' => '2024-07-05',
                'descripcion' => 'Proceso de secado y clasificación del plátano post-cosecha.',
                'ubicacion' => 'Finca San Rafael - Sector 5',
                'estado' => 'pendiente',
                'prioridad' => 'media',
            ],
            [
                'cultivo_id' => 6, // Asumiendo que este cultivo tiene ID 6
                'tipo' => 'abono',
                'fecha_inicio' => '2024-04-10',
                'fecha_fin' => '2024-04-12',
                'descripcion' => 'Aplicación de abono orgánico en el cultivo de tomates.',
                'ubicacion' => 'Finca La Esperanza - Sector 6',
                'estado' => 'terminada',
                'prioridad' => 'baja',
            ],
            [
                'cultivo_id' => 7, // Asumiendo que este cultivo tiene ID 7
                'tipo' => 'tratamiento',
                'fecha_inicio' => '2024-05-15',
                'fecha_fin' => '2024-05-18',
                'descripcion' => 'Tratamiento preventivo contra plagas en los cultivos de papa.',
                'ubicacion' => 'Finca Los Andes - Sector 7',
                'estado' => 'en_trabajo',
                'prioridad' => 'media',
            ]
        ]);
    }
}
