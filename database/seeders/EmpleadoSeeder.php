<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Empleado;

class EmpleadoSeeder extends Seeder
{
    public function run()
    {
        Empleado::insert([
            [
                'nombre' => 'Philip Jaimes',
                'cedula' => 1095000121,
                'fecha_inicio' => '2024-01-10',
                'foto' => 'foto_empleado.jpg',
                'numero' => 3123456789,
                'estado' => 'Activo',
                'tipo_contrato' => 'Horas',
                'numero_emergencia' => 3112345678,
                'nss' => '123-45-6789',

            ],
            [

                'nombre' => 'Mauricio Villamizar',
                'cedula' => 108723132,
                'fecha_inicio' => '2004-02-10',
                'foto' => 'foto_empleado1.jpg',
                'numero' => 31223132,
                'estado' => 'Activo',
                'tipo_contrato' => 'Planta',
                'numero_emergencia' => 3112345678,
                'nss' => '34-45-6789',
            ]

         
        ]);
  
    }
}
