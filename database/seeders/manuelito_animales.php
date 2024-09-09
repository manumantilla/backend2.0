<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str; // Asegúrate de importar Str correctamente
class manuelito_animales extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $locations = [
            ['latitude' => 6.910356, 'longitude' => -72.843997],
            ['latitude' => 6.911356, 'longitude' => -72.845997],
            ['latitude' => 6.912356, 'longitude' => -72.847997],
            ['latitude' => 6.913356, 'longitude' => -72.849997],
            ['latitude' => 6.914356, 'longitude' => -72.851997],
        ];
        //
        $especies = ['bovino','equino','cabro'];
        $razas_bovino = ['brahman blanco','brahman rojo','gyrolando'];
        $ciudades = ['Bucaramanga','Lebrija','Yopal'];
        $generos = ['macho','hembra'];
        $estados = ['Activo','Fallecidos','Vendido','Perdido'];

        for($i=0; $i<50; $i++){
               // Randomly select a geographic location
            $randomLocation = $locations[array_rand($locations)];

            $especie = $especies[array_rand($especies)];
            $raza = $especie == 'bovino' ? $razas_bovino[array_rand($razas_bovino)] : 'null';
            DB::table('animals')->insert([
                'identificacion' => Str::random(3) . '-' . rand(100, 999) . '-' . rand(1, 9),
                'nombre' => Str::random(5),
                'especie' => $especie,
                'raza' => $raza,
                'fecha_nacimiento' => now()->subYears(rand(1, 10)),
                'fecha_ingreso' => now()->subMonths(rand(1, 12)),
                'origen' => $ciudades[array_rand($ciudades)],
                'genero' => $generos[array_rand($generos)],
                'estado' => $estados[array_rand($estados)],
                'peso' => rand(120, 650),
                'latitude' => $randomLocation['latitude'],
                'longitude' => $randomLocation['longitude'],
                'foto' => 'null', // Aquí puedes gestionar la subida de fotos
            ]);
        }

    }
}
