@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-10 p-6 bg-white shadow-xl rounded-lg">
    <h1 class="text-3xl font-bold mb-4">Listado de Envíos</h1>

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('envios.create') }}" class="inline-block bg-blue-600 text-white font-semibold py-2 px-4 rounded-md hover:bg-blue-500 transition mb-3">Registrar Nuevo Envío</a>

    <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-md">
        <thead>
            <tr class="bg-gray-200 text-gray-700 text-left">
                <th class="py-3 px-4 border-b">ID</th>
                <th class="py-3 px-4 border-b">Cultivo</th>
                <th class="py-3 px-4 border-b">Peso (kg)</th>
                <th class="py-3 px-4 border-b">Bultos Calidad Alta</th>
                <th class="py-3 px-4 border-b">Bultos Calidad Media</th>
                <th class="py-3 px-4 border-b">Bultos Calidad Baja</th>
                <th class="py-3 px-4 border-b">Costos Generales</th>
                <th class="py-3 px-4 border-b">Placa Vehículo</th>
                <th class="py-3 px-4 border-b">Nombre Conductor</th>
                <th class="py-3 px-4 border-b">Valor Flete</th>
                <th class="py-3 px-4 border-b">Fecha Envío</th>
                <th class="py-3 px-4 border-b">Estado</th>
                <th class="py-3 px-4 border-b">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($envios as $envio)
                <tr class="hover:bg-gray-100">
                    <td class="py-2 px-4 border-b">{{ $envio->id }}</td>
                    <td class="py-2 px-4 border-b">{{ $envio->cultivo->nombre }}</td>
                    <td class="py-2 px-4 border-b">{{ $envio->peso }}</td>
                    <td class="py-2 px-4 border-b">{{ $envio->bultos_calidad_alta }}</td>
                    <td class="py-2 px-4 border-b">{{ $envio->bultos_calidad_media }}</td>
                    <td class="py-2 px-4 border-b">{{ $envio->bultos_calidad_baja }}</td>
                    <td class="py-2 px-4 border-b">{{ $envio->costos_generales }}</td>
                    <td class="py-2 px-4 border-b">{{ $envio->placa_vehiculo }}</td>
                    <td class="py-2 px-4 border-b">{{ $envio->nombre_conductor }}</td>
                    <td class="py-2 px-4 border-b">{{ $envio->valor_flete }}</td>
                    <td class="py-2 px-4 border-b">{{ $envio->fecha_envio }}</td>
                    <td class="py-2 px-4 border-b">{{ $envio->estado }}</td>
                    <td class="py-2 px-4 border-b">
                        <a href="{{ route('envios.edit', $envio) }}" class="bg-yellow-500 text-white font-semibold py-1 px-3 rounded-md hover:bg-yellow-400 transition">Editar</a>
                        <form action="{{ route('envios.destroy', $envio) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-600 text-white font-semibold py-1 px-3 rounded-md hover:bg-red-500 transition">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
