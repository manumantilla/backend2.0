@extends('layouts.app')
@section('content')

<div class="">

<h1 class="text-center text-2xl py-6">
    Informe médico del día: {{ \Carbon\Carbon::now()->locale('es')->isoFormat('dddd D [de] MMMM') }}
</h1>


    <div class="max-w-4xl mx-auto p-6 bg-white shadow-md rounded-md mt-2">
        <h3 class="text-lg font-semibold text-gray-700 mb-4">Estado de Salud del Animal {{$animal->nombre}} con id {{$animal->id}}
        </h3>

        <form method="POST" action="{{route('animales.addRegistro',$animal->id)}}">
            @csrf  
            <div class="grid grid-cols-2 gap-6 mb-6">
                
                <div>
                    <label class="block text-sm font-medium text-gray-700">Peso</label>
                    <input type="number" name="peso" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                    <input type="number" name="animal_id" value="{{$animal->id}}">
                </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Detalles en piel</label>
                        <input type="text" name="detalles_piel" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                    </div>
            </div>
            <!--Here we are going to create a new div but with 4 columns with grid-->
            <div class="grid grid-cols-5 gap-6 mb-6">
                        <div class="mb-4">
                            <label class="flex items-center space-x-3">
                            <input type="checkbox" class="form-checkbox h-5 w-5 text-indigo-600" name="infeccion[]" value="garrapatas">
                            <span class="text-gray-700">Garrapatas</span>
                            </label>
                        </div>

                        <div class="mb-4">
                            <label class="flex items-center space-x-3">
                            <input type="checkbox" class="form-checkbox h-5 w-5 text-indigo-600" name="infeccion[]" value="piojo">
                            <span class="text-gray-700">Piojo</span>
                            </label>
                        </div>

                        <div class="mb-4">
                            <label class="flex items-center space-x-3">
                            <input type="checkbox" class="form-checkbox h-5 w-5 text-indigo-600" name="infeccion[]" value="dermatitis">
                            <span class="text-gray-700">Dermatitis</span>
                            </label>
                        </div>
                        <div class="mb-4">
                            <label class="flex items-center space-x-3">
                            <input type="checkbox" class="form-checkbox h-5 w-5 text-indigo-600" name="infeccion[]" value="piojo">
                            <span class="text-gray-700">Herida infectada</span>
                            </label>
                        </div>
                        <div class="mb-4">
                            <label class="flex items-center space-x-3">
                            <input type="checkbox" class="form-checkbox h-5 w-5 text-indigo-600" name="infeccion[]" value="ninguna">
                            <span class="text-gray-700">Ninguna</span>
                            </label>
                        </div>
            </div>
            <!--Tratamientos aplicados-->
            <div class="grid grid-cols-3 gap-6 mb-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Medicamento</label>
                    <input type="text" name="medicamento" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Dosis y Frecuencia</label>
                    <input type="text" name="dosis_frecuencia" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Fecha Administracion</label>
                    <input type="date" name="fecha_adm_medicamento" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Tipo Vacuna</label>
                    <input type="text" name="vacuna" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Fecha Aplicacion Vacuna</label>
                    <input type="date" name="fecha_apl_vacuna" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                </div>

            </div>
            <h2 class="text-lg font-semibold text-gray-700 mb-4">Proximas Acciones</h2>
            <div class="grid grid-cols-3 gap-6 mb-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Necesidades</label>
                    <input type="text" name="necesidades" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Prox Fecha Visita Veterinario</label>
                    <input type="date" name="fecha_vis_medico" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                </div>

            </div>
            <div class="flex justify-center m-5">
            <button type="submit" class=" mr-4 py-2  px-4 bg-indigo-600 text-white rounded-md">Enviar Registro</button>
            </div>
           
        </form>

    </div>


</div>
@endsection