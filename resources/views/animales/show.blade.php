@extends('layouts.app')
@section('content')
<div class="container mx-auto p-6 bg-white shadow-md rounded-md mt-10">
    <h1 class="text-2xl font-semibold text-gray-700 mb-4">Detalles del Animal</h1>
    <div class="flex flex-col md:flex-row items-start md:items-center gap-8">
        <!-- Imagen del Animal -->
        <div class="flex-shrink-0">
            <img src="{{ asset('images/' . $animal->foto) }}" alt="Foto del Animal" class="w-48 h-48 object-cover rounded-md shadow-md">
        </div>
        <!-- Información del Animal -->
        <div class="flex-1">
            <div class="mb-4">
                <h2 class="text-lg text-gray-800 font-bold">Información del Animal</h2>
                <p class="mb-1"><span class="font-semibold">Identificación:</span> {{ $animal->identificación }}</p>
                <p class="mb-1"><span class="font-semibold">Nombre:</span> {{ $animal->nombre }}</p>
                <p class="mb-1"><span class="font-semibold">Especie:</span>{{ $animal->especie }}</p>
                <p class="mb-1"><span class="font-semibold">Raza:</span> {{ $animal->raza }}</p>
                <p class="mb-1"><span class="font-semibold">Fecha de Nacimiento:</span> {{ $animal->fecha_nacimiento }}</p>
                <p class="mb-1"><span class="font-semibold">Fecha de Ingreso: </span>{{ $animal->fecha_ingreso }}</p>
                <p class="mb-1"><span class="font-semibold">Origen:</span> {{ $animal->origen }}</p>
                <p class="mb-1"><span class="font-semibold">Género:</span> {{ $animal->genero }}</p>
                <p class="mb-1"><span class="font-semibold">Estado: </span>
                <p class="mb-1"><span class="font-semibold">Estado: </span>
                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full {{ $animal->estado == 'Activo' || $animal->estado == 'activo' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                        {{ $animal->estado }}
                    </span>
                </p>

                </p>
                <p class="mb-1"><span class="font-semibold">Peso:</span> {{ $animal->peso }} kg</p>
            </div>
            <!-- Enlaces adicionales -->
            <div class="mt-6 flex flex-col md:flex-row gap-4">
                @if($animal->estado == 'Activo' || $animal->estado == 'activo')
                <a href="{{ route('animales.registroMedico', $animal->id) }}" class="text-indigo-600 hover:text-indigo-900 font-medium">Agregar Registro Médico</a>
                <a href="{{ route('animales.venta', $animal->id) }}" class="text-black-600 hover:text-black-900 font-medium">Vender</a>
                @endif
                <a href="{{ route('animales.showRegistro', $animal->id) }}" class="text-red-600 hover:text-red-900 font-medium">Ver Registro Medico</a>

            </div>
        </div>
    </div>
    <!-- Botón de volver -->
    <div class="mt-6">
        <a href="{{ route('animales.index') }}" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700">Volver a la Lista</a>
    </div>
</div>
@endsection
