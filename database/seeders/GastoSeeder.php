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
        ],
        [
            'cultivo_id' => 2,
            'foto' => 'pesticida.jpg',
            'responsable' => 'Ana Gómez',
            'descripcion' => 'Adquisición de pesticidas',
            'valor' => 800000,
            'vendedor' => 'AgroQuímica Ltda.',
            'tipo' => 'Pesticida',
            'ciclo' => 'cura',
        ],
        [
            'cultivo_id' => 3,
            'foto' => 'riego.jpg',
            'responsable' => 'Carlos Ruiz',
            'descripcion' => 'Instalación de sistema de riego',
            'valor' => 2000000,
            'vendedor' => 'Riego Perfecto S.A.',
            'tipo' => 'Riego',
            'ciclo' => 'abono',
        ],
        [
            'cultivo_id' => 1,
            'foto' => 'transporte.jpg',
            'responsable' => 'Luisa Martínez',
            'descripcion' => 'Transporte de insumos agrícolas',
            'valor' => 500000,
            'vendedor' => 'Transportes Agro',
            'tipo' => 'Transporte',
            'ciclo' => 'engrosamiento',
        ],
        [
            'cultivo_id' => 4,
            'foto' => 'daños_menores.jpg',
            'responsable' => 'Jorge López',
            'descripcion' => 'Reparación de cercas dañadas',
            'valor' => 300000,
            'vendedor' => 'Construcciones Rápidas',
            'tipo' => 'Daños Menores',
            'ciclo' => 'nacimiento',
        ],
        [
            'cultivo_id' => 2,
            'foto' => 'fertilizante2.jpg',
            'responsable' => 'María Fernanda',
            'descripcion' => 'Compra de fertilizantes orgánicos',
            'valor' => 1200000,
            'vendedor' => 'EcoAgro Ltda.',
            'tipo' => 'Fertilizante',
            'ciclo' => 'cura',
        ],
        [
            'cultivo_id' => 3,
            'foto' => 'pesticida2.jpg',
            'responsable' => 'Pedro Castillo',
            'descripcion' => 'Adquisición de pesticidas ecológicos',
            'valor' => 900000,
            'vendedor' => 'BioQuímica S.A.',
            'tipo' => 'Pesticida',
            'ciclo' => 'abono',
        ],
        [
            'cultivo_id' => 4,
            'foto' => 'riego2.jpg',
            'responsable' => 'Sofía Hernández',
            'descripcion' => 'Mantenimiento del sistema de riego',
            'valor' => 600000,
            'vendedor' => 'Riego y Más',
            'tipo' => 'Riego',
            'ciclo' => 'engrosamiento',
        ],
    
    );
    }
}
