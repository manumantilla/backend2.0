<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal; // Importar el modelo 'Animal' correctamente
use App\Models\RegistroMedico; //Importamos el modelo 'registroMedico' 
use App\Models\Venta;
class AnimalController extends Controller
{
    //Show the Medical register
    public function registroMedico(Animal $animal){
        return view('animales.registroMedico',compact('animal'));
    }
    //Add info to the registro medico
    public function addRegistro(Request $request, Animal $animal){
        //validar algunos campos importantes
        $request->validate([
            'animal_id' => 'required|exists:animals,id',
            'peso' => 'required|numeric',
        ]);
        //Obtener el id del animal 
        $animalId = $request->input('animal_id');
        //Crear el nueov registro medico
        $registroMedico = new RegistroMedico();
        $registroMedico -> animal_id = $request->input('animal_id');
        $registroMedico -> peso =$request->input('peso');
        $registroMedico -> medicamento = $request->input('medicamento');
        $registroMedico -> dosis_frecuencia = $request->input('dosis_frecuencia');
        $registroMedico -> fecha_adm_medicamento = $request->input('fecha_adm_medicamento');
        $registroMedico -> vacuna = $request->input('vacuna');
        $registroMedico -> fecha_apl_vacuna = $request->input('fecha_apl_vacuna');
        $registroMedico -> necesidades = $request->input('necesidades');
        $registroMedico -> fecha_vis_medico = $request->input('fecha_vis_medico');
        $registroMedico -> save();
        //Update the weigth 
        $animal = Animal::find($request->input('animal_id'));
        $animal->peso = $request->input('peso');
        $animal->save();
        //redirigimos
        return redirect()->route('animales.index')->with('success','Registro Medico Guardado');
    }
    //Shwo informes medicos
    public function showRegistro(Animal $animal){
        //Obtener todos los registros medicos asociados al animal
        $registrosMedicos = $animal->registrosMedicos;
        return view('animales.showRegistro', compact('animal','registrosMedicos'));
    }
    //show venta
    public function venta(Animal $animal){
        return view('animales.vende',compact('animal'));
    }
    // Mostrar la lista de todos los animales
    public function index()
    {
        // Obtener todos los animales de la base de datos
        $animales = Animal::all(); // Usa 'Animal' en lugar de 'Animals'
        
        // Retornar la vista 'animales.index' con la lista de animales
        return view('animales.index', compact('animales'));
    }
    // Mostrar el formulario de creación
    public function create()
    {
        return view('animales.create');
    }
    // Almacenar un nuevo animal
    public function store(Request $request)
    {
        $request->validate([
            // Corregido: 'animals' es el nombre de la tabla en plural
            'nombre' => 'required|string|max:255',
            'especie' => 'required|string|max:255',
            'raza' => 'nullable|string|max:255',
            'fecha_nacimiento' => 'required|date',
            'fecha_ingreso' => 'required|date',
            'origen' => 'nullable|string|max:255',
            'estado' => 'required|string|in:Activo,Fallecido,Vendido',
            'genero' => 'required|string|in:Hembra,Macho',
            'peso' => 'required|numeric',
            'identificacion' => 'required|string|unique:animals|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'latitude' => 'nullable|string',
            'longitude' => 'nullable|string',
        ]);
        //Manejar la subida de la foto
     // Handle the file upload
        if ($request->hasFile('foto')) {
            // Use Laravel's store() method for managing the file
            $imageName = $request->file('foto')->store('public/images');
        } else {
            $imageName = null;
        }
        Animal::create([
            'nombre'=> $request->nombre,
            'especie' => $request->especie,
            'raza' => $request->raza,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'fecha_ingreso' => $request->fecha_ingreso,
            'origen' => $request->origen,
            'genero' => $request->genero,
            'estado' => $request->estado,
            'identificacion' => $request->identificacion,
            'peso' => $request->peso,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'foto' => $imageName,
        ]); 
        return redirect()->route('animales.index')->with('success', 'Animal registrado exitosamente');
    }

    // Mostrar los detalles de un animal específico
    public function show(Animal $animal) 
    {
        return view('animales.show', compact('animal'));
    }
    // Mostrar el formulario de edición
    public function edit(Animal $animal)
    {
        return view('animales.edit', compact('animal'));
    }
    // Actualizar un animal existente
    public function update(Request $request, Animal $animal)
    {
        $request->validate([
            'identificacion' => 'required|max:255|unique:animals,identificacion,' . $animal->id,
            'especie' => 'required',
            'nombre' => 'required',
            'fecha_ingreso' => 'required|date',
            'genero' => 'required|in:Macho,Hembra',
        ]);
        $animal->update($request->all());
        return redirect()->route('animales.index')->with('success', 'Animal actualizado exitosamente');
    }

    // Eliminar un animal
    public function destroy(Animal $animal)
    {
        $animal->delete();
        return redirect()->route('animales.index')->with('success', 'Animal eliminado exitosamente');
    }
    public function sell(Request $request, $id) {
        //dd($request->all());
        $request->validate([
            'peso_venta' => 'required|numeric',
            'valor_kilo' => 'required|numeric',
            'nombre_comprador' => 'required|string|max:255',
            'contacto_comprador' => 'required|string|max:255',
            'guia' => 'mimes:jpeg,png,jpg,gif,svg,pdf', // Archivo opcional
        ]);
    
        $imageName = null;
        if ($request->hasFile('guia')) {
            $imageName = time() . '.' . $request->file('guia')->extension();
            $request->file('guia')->move(public_path('uploads/images'), $imageName);
        }
    
    
            // Crear una nueva venta
            $venta = new Venta();
            $venta->peso_venta = $request->input('peso_venta');
            $venta->valor_kilo = $request->input('valor_kilo');
            $venta->nombre_comprador = $request->input('nombre_comprador');
            $venta->contacto_comprador = $request->input('contacto_comprador');
            $venta->animalId = $id; // Usamos el ID recibido por la ruta
            $venta->guia = $imageName;
            $venta->save();
    
            // Actualizar el peso del animal y marcarlo como vendido
            $animal = Animal::findOrFail($id);
            $animal->peso = $request->input('peso_venta');
            $animal->estado = 'Vendido';
            $animal->save();
    
            return redirect()->route('animales.index')->with('success', 'Animal vendido exitosamente.');
       
    }
    
    }

