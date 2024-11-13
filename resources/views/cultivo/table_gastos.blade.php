@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-10 p-6 bg-white shadow-lg rounded-lg">
    <h1 class="text-3xl font-bold mb-4">Gastos del Cultivo: {{ $cultivo->nombre }}</h1>

    <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-md">
        <thead>
            <tr class="bg-gray-200 text-gray-700">
                <th class="py-3 px-4 border-b">Foto</th>
                <th class="py-3 px-4 border-b">Tipo</th>
                <th class="py-3 px-4 border-b">Ciclo</th>
                <th class="py-3 px-4 border-b">Responsable</th>
                <th class="py-3 px-4 border-b">Descripción</th>
                <th class="py-3 px-4 border-b">Valor</th>
                <th class="py-3 px-4 border-b">Vendedor</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($gastos as $gasto)
                <tr class="hover:bg-gray-100">
                    <td class="py-2 px-4 border-b">
                        <img src="{{ Storage::url($gasto->foto) }}" alt="Foto" class="w-20 h-20 object-cover">
                    </td>
                    <td class="py-2 px-4 border-b">{{ $gasto->tipo }}</td>
                    <td class="py-2 px-4 border-b">{{ $gasto->ciclo }}</td>
                    <td class="py-2 px-4 border-b">{{ $gasto->responsable }}</td>
                    <td class="py-2 px-4 border-b">{{ $gasto->descripcion }}</td>
                    <td class="py-2 px-4 border-b">${{ number_format($gasto->valor) }}</td>
                    <td class="py-2 px-4 border-b">{{ $gasto->vendedor }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
