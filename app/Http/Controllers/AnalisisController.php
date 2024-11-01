<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Envio;
use App\Models\Gasto;



class AnalisisController extends Controller
{
    //
    public function index(){
        $envios = Envio::all();
        $gastos = Gasto::all();
        $ganancias = [];
        
        foreach($envios as $envio){
            $gastoTotal = $gastos->where('cultivo_id', $envio->cultivo_id)->sum('valor');
            $ganancia = $envio->valor_flete - $gastoTotal;

            
        }
    }
}
