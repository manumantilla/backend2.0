@extends('layouts.app')
@section('content')
<div class="overflow-x-auto m-12">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 tracking-wider">Id Animal</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 tracking-wider">Peso</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 tracking-wider">Medicamento Suministrado</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 tracking-wider">Dosis / Frecuencia</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 tracking-wider">Fecha Administracion Medicamento</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 tracking-wider">Vacuna Aplicada</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 tracking-wider">Fecha Aplicacion Vacuna</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 tracking-wider">Necesidades</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 tracking-wider">Prox Fecha Visita Veterinario</th>
            </tr>
        </thead>
        <tbody>
            @foreach($registrosMedicos as $registro)
            <tr>
                <th class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$registro -> animal_id}}</th>
                <th class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$registro -> peso}}</th>
                <th class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$registro -> medicamento}}</th>
                <th class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$registro -> dosis_frecuencia}}</th>
                <th class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"></th>
                <th class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$registro -> fecha_adm_medicamento}}</th>
                <th class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$registro -> fecha_apl_vacuna}}</th>
                <th class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$registro -> necesidades}}</th>
                <th class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$registro -> fecha_vis_medico}}</th>
            </tr>
            @endforeach
        </tbody>
    </table>
    <button type="submi" class="text-red-600 ml-2" onclick=" return confirm('seguro quieres regresar?')"></button>

</div>
@endsection