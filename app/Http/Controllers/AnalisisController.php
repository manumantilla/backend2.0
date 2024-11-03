<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Envio;
use App\Models\Gasto;
use App\Models\Cultivo;



class AnalisisController extends Controller
{
    //
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
    
}
