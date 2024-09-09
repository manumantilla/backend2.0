<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CultivoController extends Controller
{
    // ? Save a new Crop
    public function store(Request $request){
        $request->validate([
            'nombre' => 'required|string|max:255',
            'fecha_siembra' => 'required',
            'fecha_cosecha' => 'required',
            'area' => 'required',
            'estado' => 'required|string',
            'semilla' => 'required|string',
            'descripcion_semilla' => 'required|string',
            'viajes_abono' => 'required',
        ]);
        Cultivo::create([
            'nombre' => $request->nombre,
            'fecha_siembra' => $request->fecha_siembra,
            'fecha_cosecha' => $request->fecha_cosecha,
            'area' => $request->area,
            'estado' => $request->estado,
            'semilla'=> $request->semilla,
            'descripcion_semilla'=>$request->descripcion_semilla,
            'viajes_abono'=>$request->viajes_abono,
        ]);
        return redirect()->route('cultivo.index')->with('success','Cultivo Registrado Exitosamente');
    }
    // ? Show all crops
    public function show(){
        //Retrieve
        $cultivos = Cultivo::all();
        //Pass all cultivos
        return view('cultivo.index',compact($cultivos));
    }
    // ? Show specfiic cultivo
    public function showSpecific(Cultivo $cultivo){
        return view('cultivo.showSpecific', compact('animal'));
    }
    // ? delete a crop
    public function destroy(Cultivo $cultivo){
        $animal -> delete();
        return redirect()->route('cultivo.index')->with('success','Cultivo Eliminado Exitosamente');
    }
    // ? Edur
    public function edit(Cultivo $cultvio){
        return view('cultivo.edit', compact('cultivo'));
    }
    // ? Update
    public function update(Request $request, Cultivo $cultivo){
        $request->validate([
                
        ]);
        $cultivo->update($request->all());
        return redirect()->route('cultivo.index')->with('success','Cultivo Actualizado Exitosamente');
    }
    // * Add un gasto
    public function addGasto(Request $request){
        $request->validate([
            'monto' => 'required|numeric',
            'fecha' => 'required',
            'descripcion' => 'required|string',
            'foto' => 'nullable|mimes:jpg,jpeg,png,svg,pdf',
            
            'cultivo_id' => 'nullable|exists:cultivos,id',
        ]);
        if ($request->hasFile('foto')){
            $imageName = $request->file('foto')->store('public/images');
        }else{
            $imageName = null;
        }
        $gasto = new Gasto();
        $gasto->monto = $request->input('monto');
        $gasto->fecha = $request->input('fecha');
        $gasto->descripcion = $request->input('descripcion');
        $gasto->foto = $imageName;

        if($request->input('cultivo_id')){
            $gasto->cultivo_id = $request->input('cultivo_id');
        }
        $gasto -> save();
        return redirect()->route('animales.index')->with('success','Agregar Gasto')

    }
}
