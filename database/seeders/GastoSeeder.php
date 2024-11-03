<?php

namespace Database\Seeders;


use Iluminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Gasto;

class GastoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Gasto::insert([
            'cultivo_id' => 1,
            'foto' => 'foto_gasto.jpg',
            'responsable' => 'Mauricio Pérez',
            'descripcion' => 'Compra de fertilizantes',
            'valor' => 1500000,
            'vendedor' => 'Proveedor AgroInsumos',
            'tipo' => 'Fertilizante',
            'ciclo' => 'nacimiento',
        ]);
    }
}
