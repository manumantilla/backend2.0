@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-6">Trabajos de la Finca</h1>

    <table class="min-w-full bg-white">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b border-gray-300">Cultivo</th>
                <th class="py-2 px-4 border-b border-gray-300">Tipo de Trabajo</th>
                <th class="py-2 px-4 border-b border-gray-300">Fecha Inicio</th>
                <th class="py-2 px-4 border-b border-gray-300">Fecha Fin</th>
                <th class="py-2 px-4 border-b border-gray-300">Descripción</th>
                <th class="py-2 px-4 border-b border-gray-300">Ubicación</th>
                <th class="py-2 px-4 born   |der-b border-gray-300">Estado</th>
                <th class="py-2 px-4 border-b border-gray-300">Prioridad</th>
                <th class="py-2 px-4 border-b border-gray-300">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($trabajos as $trabajo)
                
            <tr>
                    <td class="items-center py-2 px-4 border-b border-gray-300">{{ $trabajo->cultivo ? $trabajo->cultivo->nombre : 'N/A' }}</td>
                    <td class="text-center py-2 px-4 border-b border-gray-300">{{ ucfirst($trabajo->tipo) }}</td>
                    <td class="text-center py-2 px-4 border-b border-gray-300">{{ $trabajo->fecha_inicio }}</td>
                    <td class="text-center py-2 px-4 border-b border-gray-300">{{ $trabajo->fecha_fin }}</td>
                    <td class="text-center py-2 px-4 border-b border-gray-300">{{ $trabajo->descripcion }}</td>
                    <td class="text-center py-2 px-4 border-b border-gray-300">{{ $trabajo->ubicacion }}</td>
                    <td class="text-center py-2 px-4 border-b border-gray-300">{{ ucfirst($trabajo->estado) }}</td>
                    <td class="text-center  items-center py-2 px-4 border-b border-gray-300">
                        <span class="inline-block px-2 py-1 rounded-full text-white {{ $trabajo->prioridad == 'alta' ? 'bg-red-500' : ($trabajo->prioridad == 'media' ? 'bg-yellow-500' : 'bg-green-500') }}">
                            {{ ucfirst($trabajo->prioridad) }}
                        </span>
                    </td>
                    <td class="text-center  items-center py-2 px-4 border-b border-gray-300">
                        <a class="rounded-full bg-green-200" href="{{route('cultivo.addtrabajador',$trabajo->id)}}">Agregar Obrero</a>
                        <a class="rounded-full bg-red-200" href="{{route('trabajo.empleados',$trabajo->id)}}">Obreros</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
