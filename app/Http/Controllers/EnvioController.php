<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Envio;
use App\Models\Cultivo;


class EnvioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $envios = Envio::all();
        return view('envios.index',compact('envios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $cultivos = Cultivo::all();
        return view('envios.create',compact('cultivos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'cultivo_id' => 'required|exists:cultivo,id',
            'peso' => 'required|numeric',
            'bultos_calidad_alta' => 'required|numeric',
            'bultos_calidad_media' => 'required|numeric',
            'bultos_calidad_baja' => 'required|numeric',
            'costos_generales' => 'required|numeric',
            'placa_vehiculo' => 'required|string|max:10',
            'nombre_conductor' => 'required|string|max:255',
            'valor_flete' => 'required|numeric',
            'fecha_envio' => 'required|date',
            'valor_bultos_calidad_alta' => 'required|numeric',
            'valor_bultos_calidad_media' => 'required|numeric',
            'valor_bultos_calidad_baja' => 'required|numeric',
            'comprador' => 'required|string|max:255',
            'estado' => 'required|in:viaje,centroabastos,deuda,pago',
        ]);

        Envio::create($request->all()); // Guardar el envío
        return redirect()->route('envios.index')->with('success', 'Envío registrado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'cultivo_id' => 'required|exists:cultivo,id',
            'peso' => 'required|numeric',
            'bultos_calidad_alta' => 'required|numeric',
            'bultos_calidad_media' => 'required|numeric',
            'bultos_calidad_baja' => 'required|numeric',
            'costos_generales' => 'required|numeric',
            'placa_vehiculo' => 'required|string|max:10',
            'nombre_conductor' => 'required|string|max:255',
            'valor_flete' => 'required|numeric',
            'fecha_envio' => 'required|date',
            'valor_bultos_calidad_alta' => 'required|numeric',
            'valor_bultos_calidad_media' => 'required|numeric',
            'valor_bultos_calidad_baja' => 'required|numeric',
            'comprador' => 'required|string|max:255',
            'estado' => 'required|in:viaje,centroabastos,deuda,pago',
        ]);

        $envio->update($request->all()); // Actualizar el envío
        return redirect()->route('envios.index')->with('success', 'Envío actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Envio $envio)
    {
        //
        $envio->delete();
        return redirect()->route('envios.index')->with('success','Envio Eliminado');
    }
}
