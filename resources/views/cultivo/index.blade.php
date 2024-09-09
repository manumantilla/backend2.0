@extends('layouts.app')
@section('content')
<h2>Siembras</h2>
<div class="flex items-center justify-between mb-6">
    <div>
        <h1 class="text-2xl font-semibold text-gray-700">Lista de Cultivos</h1>
    </div>
</div>
<div class="overflow-x-auto">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 tracking-wider">ID</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 tracking-wider">Nombre</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 tracking-wider">Fecha Siembra</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 tracking-wider">Fecha tentable cosecha</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 tracking-wider">Area Cultivo</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 tracking-wider">Estado</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 tracking-wider">Acciones</th>

            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($cultivos as $cultivo )
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$cultivo->id}}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$cultivo->nombre}}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$cultivo->fecha_siembra}}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$cultivo->fecha_cosecha}}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                        <a href="{{route('cultivo.show',$cultivo->id)}}" class="text-indigo-600 hover:text-indigo-900">Ver</a> 
                        <a href="{{route('cultivo.edit',$cultivo->id)}}" class="text-indigo-600 hover:text-indigo-900">Editar</a> 
                        <a href="{{route('cultivo.delete',$cultivo->id)}}" class="text-indigo-600 hover:text-indigo-900">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900 ml-2" onclick="return confirm('Estas seguro?')">Eliminar</button>
                        </a> 
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
</div>
@endsection