<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminta\Support\Facades\DB;   

class EmpleadoTrabajoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('empleado_trabajo')->insert([
            'trabajo_id' => 1,
            'empleado_id' => 1,
            'descripcion' => 'Recolección de maíz',
            'pago' => 50000
        ]);
    }
}
