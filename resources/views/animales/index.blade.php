@extends('layouts.app')

@section('content')

<div class=" p-6 bg-white shadow-md rounded-md mt-10">
    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-semibold text-gray-700">Lista de Animales  &#x1f404</h1>
            <p class="text-sm text-gray-500">Una lista de todos los animales registrados incluyendo su nombre, especie, raza, etc.</p>
        </div>
        <a href="{{ route('animales.create') }}" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700">Agregar Animal</a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 px-4 py-3 rounded relative mb-6" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div style=""class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                    <th style="width:20px;"  scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Identificacion</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Especie</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Raza</th>
                    <th style="width:20px;" scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha de Nacimiento</th>
                    <th style="width:20px;"  scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha de Ingreso</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Origen</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Genero</th>
                    <th style="width:20px;"  scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estado</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Peso</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Etapa</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($animales as $animal)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $animal->id }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $animal->identificacion }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $animal->nombre }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $animal->especie }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $animal->raza }}</td>
                    <td style="width:14px;"  class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $animal->fecha_nacimiento }}</td>
                    <td style="width:14px;"  class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $animal->fecha_ingreso }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $animal->origen }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $animal->genero }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                            {{ $animal->estado == 'Activo' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                            {{ $animal->estado }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $animal->peso }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $animal->etapa }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <a href="{{ route('animales.show', $animal->id) }}" class="text-indigo-600 hover:text-indigo-900">Ver</a>
                        <a href="{{ route('animales.edit', $animal->id) }}" class="ml-2 text-indigo-600 hover:text-indigo-900">Editar</a>
                        <form action="{{ route('animales.destroy', $animal->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900 ml-2" onclick="return confirm('¿Estas seguro de eliminar este animal?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
