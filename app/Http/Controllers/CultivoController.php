<?php

namespace App\Http\Controllers;
use App\Models\Cultivo;
use App\Models\Empleado;
use App\Models\Empleado_Trabajo;
use App\Models\Envio;
use App\Models\Gasto;
use App\Models\Trabajo;
use App\Models\Venta;

use Illuminate\Support\Facades\Log;


use Illuminate\Http\Request;


class CultivoController extends Controller
{
    // todo 

    //? Show form for add crop
    public function showFormCrop(){
        return view('cultivo.create');
    }
    // ? Save a new Crop
    public function store(Request $request)
    {
        //dd($request->all()); 
        // Validación de los datos de entrada
        $request->validate([
            'nombre' => 'required|string|max:255',
            'fechasiembra' => 'required|date',
            'fechacosecha' => 'required|date|after_or_equal:fechasiembra',
            'area' => 'required',
            'estado' => 'required',
            'semilla' => 'nullable',
            'abono' => 'nullable',
            'gasto' => 'nullable',
            'latitude' => 'nullable',
            'longitude' => 'nullable',
            'rendimiento' => 'nullable',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png', // Restricción para archivos de imagen
        ]);
    
        // Manejo de la imagen
        $imageName = null;
        if ($request->hasFile('foto')) {
            $imageName = $request->file('foto')->store('public/foto_cultivo');
        }
    
        // Creación del objeto Cultivo
        $cultivo = new Cultivo();
        $cultivo->nombre = $request->input('nombre');
        $cultivo->ph = $request->input('ph');
        $cultivo->fecha_siembra = $request->input('fechasiembra');
        $cultivo->fecha_cosecha = $request->input('fechacosecha');
        $cultivo->area = $request->input('area');
        $cultivo->estado = $request->input('estado');
        $cultivo->gasto = $request->input('gasto');
        $cultivo->latitude = $request->input('latitude');
        $cultivo->longitude = $request->input('longitude');
        $cultivo->foto = $imageName;
        $cultivo->bultos_abono = $request->input('abono');
        $cultivo->semilla = $request->input('semilla');
        $cultivo->etapa = $request->input('etapa');
        $cultivo->rendimiento = $request->input('rendimiento');
        $cultivo->tratamiento = $request->input('tratamiento');
        
        // Guarda el objeto en la base de datos
        //$cultivo->save();
        try {
    
            $cultivo->save();
            return redirect()->route('animales.index')->with('success', 'Cultivo Registrado Exitosamente');
        } catch (\Exception $e) {
            Log::error('Error al guardar el cultivo: ' . $e->getMessage());
            return back()->withErrors('Error al guardar el cultivo: ' . $e->getMessage())->withInput();
        }
        
        // Redirección con mensaje de éxito
        return redirect()->route('animales.index')->with('success', 'Cultivo Registrado Exitosamente');
    }
    // ? Show all crops
    public function showcultivos(){
        //Retrieve
        $cultivos = Cultivo::all();
        //Pass all cultivos
        return view('cultivo.index',compact('cultivos'));
    }
    // ? Show specfiic cultivo
    public function especifico(Cultivo $cultivo)
    {
        return view('cultivo.specific_cultivo', compact('cultivo'));
    }
    // ? delete a crop
    public function destroy(Cultivo $cultivo){
        $cultivo -> delete();
        return redirect()->route('cultivo.index')->with('success','Cultivo Eliminado Exitosamente');
    }
    // ? Edit a crop
    public function edit(Cultivo $cultivo){
        return view('cultivo.edit', compact('cultivo'));
    }
    // ? Update a cultivo
    public function update(Request $request, Cultivo $cultivo){
        $request->validate([
                
        ]);
        $cultivo->update($request->all());
        return redirect()->route('cultivo.index')->with('success','Cultivo Actualizado Exitosamente');
    }
    //add fumigacion o abono

    //Form gastos: get
    public function form_gastos() {
        $cultivos = Cultivo::all();
        $empleados = Empleado::where('tipo_contrato', 'Planta')->get();
    
        return view('cultivo.gasto', compact('cultivos', 'empleados'));
    }

    // Add un gasto
    public function addGasto(Request $request){
        $request->validate([
            'valor' => 'required|numeric',
            'descripcion' => 'required|string',
            'foto' => 'nullable|mimes:jpg,jpeg,png,svg,pdf',
            'cultivo_id' => 'nullable|exists:cultivos,id',
        ]);
        if ($request->hasFile('foto')){
            $imageName = $request->file('foto')->store('public/compra_facturas');
        }else{
            $imageName = null;
        }
        $gasto = new Gasto();
        $gasto->valor = $request->input('valor');
       
       //$gasto->fecha = $request->input('fecha');
        $gasto->descripcion = $request->input('descripcion');
        $gasto->foto = $imageName;

        if($request->input('cultivo_id')){
            $gasto->cultivo_id = $request->input('cultivo_id');
        }
        $gasto -> save();
        return redirect()->route('cultivo.index')->with('success','Agregar Gasto');

    }

    public function trabajo(Cultivo $cultivo) {
        return view('cultivo.create_trabajo', compact('cultivo'));
    }
    public function addTrabajo(Request $request, $id) {
        // Validación de los datos de entrada
        try {
            $request->validate([
                'tipo' => 'required|in:arado,fertilizacion inicial,abono,riego,tratamiento,cosecha,post-cosecha',
                'fecha_inicio' => 'required|date',
                'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
                'descripcion' => 'required|string|max:255',
                'ubicacion' => 'required|string|max:255',
                'estado' => 'required|in:pendiente,en_trabajo,terminada',
                'prioridad' => 'required|in:baja,media,alta',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Captura de errores de validación
            Log::error('Errores de validación: ' . json_encode($e->errors()));
            return back()->withErrors($e->validator)->withInput();
        }
    
        // Crear una nueva instancia de Trabajo
        $trabajo = new Trabajo();
        
        // Asignar valores del request a la instancia
        $trabajo->cultivo_id = $id; // Asignar el ID del cultivo
        $trabajo->tipo = $request->input('tipo');
        $trabajo->fecha_inicio = $request->input('fecha_inicio');
        $trabajo->fecha_fin = $request->input('fecha_fin');
        $trabajo->descripcion = $request->input('descripcion');
        $trabajo->ubicacion = $request->input('ubicacion');
        $trabajo->estado = $request->input('estado');
        $trabajo->prioridad = $request->input('prioridad');
    
        // Guardar el trabajo en la base de datos
        try {
            Log::info('Validación pasada, se procederá a guardar el trabajo');
            
            $trabajo->save(); // Guardar el trabajo
    
            return redirect()->route('cultivo.showcultivos')->with('success', 'Trabajo Registrado Exitosamente');
        } catch (\Exception $e) {
            Log::error('Error al guardar el trabajo: ' . $e->getMessage());
            return back()->withErrors('Error al guardar el trabajo: ' . $e->getMessage())->withInput();
        }
    }
    
    // ! Add a viaje
    public function viaje(Request $request, Cultivo $cultivo){

    }
    /**
     * E M P L E A D O S 
     */
    //* Form for add employe
    public function formEmploye(){
        return view('cultivo.create_trab');
    }
    //* Add new employe
    public function addEmploye(Request $request){
        $request->validate([]);
        if($request->hasFile('foto')){
            $imageName =  $request->file('foto')->store('public/foto_empleados');
        }else{
            $imageName = null;
        }
        $empleado = new Empleado();
        $empleado->nombre = $request->input('nombre');
        $empleado->cedula = $request->input('cedula');
        $empleado->fecha_inicio = $request->input('fecha_inicio');
        $empleado->foto = $imageName;
        $empleado->numero = $request->input('numero');
        $empleado->numero_emergencia = $request->input('numero_emergencia');
        $empleado->estado = $request->input('estado');
        $empleado->tipo_contrato = $request->input('tipo_contrato');
        $empleado->nss = $request->input('nss');
        $empleado->save();

        return redirect()->route('cultivo.index')->wiht('success','Empleado Agregado Exitosamente');

    }
    //* Show all employes
    public function showemployes(){
        $empleados = Empleado::all();
        return view('cultivo.show_trab',compact('empleados'));
    }
    //* Delete one employe
    public function destroyemployes(Empleado $empleado){
        $empleado -> delete();
        return redirect()->route('cultivo.showemployes')->with('success','Eliminado Exitosamente');
    }
    //* Edit one employe


    // todO: 

}
