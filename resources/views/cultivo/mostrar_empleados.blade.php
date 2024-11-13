<!-- resources/views/trabajo/mostrar_empleados.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h2 class="text-2xl font-semibold mb-4">Empleados relacionados con el trabajo: {{ $trabajo->descripcion }}</h2>

    @if($empleados->isEmpty())
        <p>No hay empleados relacionados con este trabajo.</p>
    @else
        <table class="min-w-full bg-white border border-gray-300">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">Nombre del Empleado</th>
                    <th class="py-2 px-4 border-b">Descripción</th>
                    <th class="py-2 px-4 border-b">Pago</th>
                </tr>
            </thead>
            <tbody>
                @foreach($empleados as $empleado)
                    <tr>
                        <td class="py-2 px-4 border-b">{{ $empleado->nombre }}</td>
                        <td class="py-2 px-4 border-b">{{ $empleado->pivot->descripcion }}</td>
                        <td class="py-2 px-4 border-b">{{ $empleado->pivot->pago }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
