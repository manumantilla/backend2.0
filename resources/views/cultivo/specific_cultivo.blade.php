@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto p-6 bg-white shadow-md rounded-lg">
    <h2 class="text-2xl font-bold text-gray-800 mb-4">Detalles del Cultivo  &#x1f331</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="bg-gray-100 p-4 rounded-md shadow-md">
            <h3 class="text-lg font-semibold text-gray-700">Nombre del Cultivo</h3>
            <p class="text-gray-600">{{ $cultivo->nombre }}</p>
        </div>

        <div class="bg-gray-100 p-4 rounded-md shadow-md">
            <h3 class="text-lg font-semibold text-gray-700">Fecha de Siembra</h3>
            <p class="text-gray-600">{{ $cultivo->fecha_siembra}}</p>
        </div>

        <div class="bg-gray-100 p-4 rounded-md shadow-md">
            <h3 class="text-lg font-semibold text-gray-700">Etapa de Cultivo</h3>
            <p class="text-gray-600">{{ $cultivo->etapa }}</p>
        </div>

        <div class="bg-gray-100 p-4 rounded-md shadow-md">
            <h3 class="text-lg font-semibold text-gray-700">Estado del Cultivo</h3>
            <p class="text-gray-600">{{ $cultivo->estado }}</p>
        </div>

        <div class="bg-gray-100 p-4 rounded-md shadow-md">
            <h3 class="text-lg font-semibold text-gray-700">Área (hectáreas)</h3>
            <p class="text-gray-600">{{ $cultivo->area }} ha</p>
        </div>

        <div class="bg-gray-100 p-4 rounded-md shadow-md">
            <h3 class="text-lg font-semibold text-gray-700">Producción Estimada</h3>
            <p class="text-gray-600">{{ $cultivo->rendimiento }} toneladas</p>
        </div>

        <div class="bg-gray-100 p-4 rounded-md shadow-md">
            <h3 class="text-lg font-semibold text-gray-700">Responsable</h3>
            <p class="text-gray-600">{{ $cultivo->responsable }}</p>
        </div>

        <div class="bg-gray-100 p-4 rounded-md shadow-md">
            <h3 class="text-lg font-semibold text-gray-700">Ubicación latitud</h3>
            <p class="text-gray-600">{{ $cultivo->latitude }}</p>
        </div>
        <div class="bg-gray-100 p-4 rounded-md shadow-md">
            <h3 class="text-lg font-semibold text-gray-700">Ubicación Longitud</h3>
            <p class="text-gray-600">{{ $cultivo->longitude }}</p>
        </div>
    </div>

    <div class="mt-6 text-center">
        <a href="{{ route('cultivo.showcultivos') }}" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-700">
            Volver a la lista de cultivos
        </a>
    </div>
</div>
@endsection
