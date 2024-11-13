@extends('layouts.app')
@section('content')
<div class="overflow-x-auto">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 tracking-wider">ID</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 tracking-wider">Nombre</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 tracking-wider">Fecha Siembra</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 tracking-wider">Area Cultivo</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 tracking-wider">Ph</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 tracking-wider">Tratamiento</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 tracking-wider">Rendimiento</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 tracking-wider">Etapa</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 tracking-wider">Bultos de Abono</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 tracking-wider">Cant Semilla</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 tracking-wider">Acciones</th>

            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($cultivos as $cultivo )
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$cultivo->id}}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$cultivo->nombre}}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$cultivo->fecha_siembra}}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$cultivo->area_cultivo}}</td>
                    
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                    {{$cultivo->ph}}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                        {{$cultivo->tratamiento}}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                        {{$cultivo->rendimiento}}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                        <span class="
                            px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                            @if ($cultivo->etapa == 'semillero') bg-blue-100 text-blue-900
                            @elseif ($cultivo->etapa == 'desplante') bg-green-100 text-green-800
                            @elseif ($cultivo->etapa == 'enraizamiento') bg-yellow-100 text-yellow-800
                            @elseif ($cultivo->etapa == 'engrosamiento') bg-orange-100 text-orange-800
                            @elseif ($cultivo->etapa == 'cosecha') bg-red-100 text-red-800
                            @endif
                        ">
                        {{ucfirst($cultivo->etapa)}}
                    </span>
                    </td>
                    <td class="px-6 py-3 text-left text-xs font-medium text-gray-500 tracking-wider">
                        {{$cultivo->bultos_abono}}
                    </td>
                    <td class="px-6 py-3 text-left text-xs font-medium text-gray-500 tracking-wider">
                        {{$cultivo->semilla}}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                        <a href="{{route('cultivo.especifico',$cultivo->id)}}" class="text-gray-600 hover:text-indigo-900">Ver</a> 
                        <a href="{{route('cultivo.edit',$cultivo->id)}}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                        <a href="{{route('cultivo.gastoSpecific',$cultivo->id)}}" class="text-indigo-600 hover:text-indigo-900">Gastos</a>
                        
                        <a href="{{route('cultivo.trabajo',$cultivo->id)}}" class="text-green-600 hover:text-indigo-900">Job</a> 
                        <a href="{{route('cultivo.destroy',$cultivo->id)}}" class="text-indigo-600 hover:text-indigo-900">
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