<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Envio;
use App\Models\Gasto;
use App\Models\Cultivo;
use Illuminate\Support\Facades\DB;

class AnalisisController extends Controller
{
    //Gastos 
    public function index(Cultivo $cultivo)
    {
        // Obtener envíos relacionados con el cultivo
        $envios = Envio::where('cultivo_id', $cultivo->id)->get();
        $ingresos_totales = 0;
    
        // Calcular ingresos totales
        foreach ($envios as $envio) {
            $ingresos_totales += (
                ($envio->bultos_calidad_alta * $envio->valor_bultos_calidad_alta +
                $envio->bultos_calidad_media * $envio->valor_bultos_calidad_media +
                $envio->bultos_calidad_baja * $envio->valor_bultos_calidad_baja)
            );
        }
    
        // Calcular los gastos totales
        $gastos_totales = Gasto::where('cultivo_id', $cultivo->id)->sum('valor');
    
        // Calcular ganancia total
        $ganancia_total = $ingresos_totales - $gastos_totales;
    
        // Retornar la vista con los datos
        return view('envios.ganancias', compact('gastos_totales', 'ganancia_total', 'cultivo'));
    }

    // * DISTRIBUCION POR ETAPA DE ANIMALES
    public function animalsByStage()
    {
        $data = DB::table('animals')
            ->select(DB::raw('etapa, COUNT(*) as count'))
            ->groupBy('etapa')
            ->get();
        
        return view('estadisticas.animalsByStage', compact('data'));
    }

    // * GENERO DE ANIMALES
    public function animalsByGender()
    {
        $data = DB::table('animals')
            ->select(DB::raw('genero, COUNT(*) as count'))
            ->groupBy('genero')
            ->get();
        
        return view('estadisticas.animalsByGender', compact('data'));
    }

    //* PESO PROM POR ETAPA DE ANIMALES
    public function averageWeightByStage()
    {
        $data = DB::table('animals')
            ->select(DB::raw('etapa, AVG(peso) as average_weight'))
            ->groupBy('etapa')
            ->get();
        
        return view('estadisticas.averageWeightByStage', compact('data'));
    }

    //* ESTADO DE LOS ANIMALES
    public function animalsByStatus()
    {
        $data = DB::table('animals')
            ->select(DB::raw('estado, COUNT(*) as count'))
            ->groupBy('estado')
            ->get();
        
        return view('estadisticas.animalsByStatus', compact('data'));
    }

    //* CULTIVOS POR ESTADO
    public function cropsByStatus()
    {
        $data = DB::table('cultivo')
            ->select(DB::raw('estado, COUNT(*) as count'))
            ->groupBy('estado')
            ->get();
        
        return view('estadisticas.cropsByStatus', compact('data'));
    }

    //* GASTO PROM POR TIPO DE GASTO
    public function averageExpenseByType()
    {
        $data = DB::table('gasto')
            ->select(DB::raw('tipo, AVG(valor) as average_expense'))
            ->groupBy('tipo')
            ->get();
        
        return view('estadisticas.averageExpenseByType', compact('data'));
    }
}
