@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-10 p-6 bg-white shadow-xl rounded-lg">
    <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">Registrar Nuevo Envío</h1>

    <form action="{{ route('envios.store') }}" method="POST">
        @csrf

        <div class="grid grid-cols-3 md:grid-cols-3 gap-4">

            <div class="mb-3">
                <label for="cultivo_id" class="form-label font-medium text-gray-700">Cultivo:</label>
                <select name="cultivo_id" id="cultivo_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                    <option value="" disabled selected>Selecciona un cultivo</option>
                    @foreach($cultivos as $cultivo)
                        <option value="{{ $cultivo->id }}">{{ $cultivo->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="peso" class="form-label font-medium text-gray-700">Peso (kg):</label>
                <input type="number" name="peso" id="peso" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
            </div>

            <div class="mb-3">
                <label for="bultos_calidad_alta" class="form-label font-medium text-gray-700">Bultos Calidad Alta:</label>
                <input type="number" name="bultos_calidad_alta" id="bultos_calidad_alta" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
            </div>

            <div class="mb-3">
                <label for="bultos_calidad_media" class="form-label font-medium text-gray-700">Bultos Calidad Media:</label>
                <input type="number" name="bultos_calidad_media" id="bultos_calidad_media" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
            </div>

            <div class="mb-3">
                <label for="bultos_calidad_baja" class="form-label font-medium text-gray-700">Bultos Calidad Baja:</label>
                <input type="number" name="bultos_calidad_baja" id="bultos_calidad_baja" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
            </div>

            <div class="mb-3">
                <label for="costos_generales" class="form-label font-medium text-gray-700">Costos Generales:</label>
                <input type="number" name="costos_generales" id="costos_generales" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
            </div>

            <div class="mb-3">
                <label for="placa_vehiculo" class="form-label font-medium text-gray-700">Placa Vehículo:</label>
                <input type="text" name="placa_vehiculo" id="placa_vehiculo" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
            </div>

            <div class="mb-3">
                <label for="nombre_conductor" class="form-label font-medium text-gray-700">Nombre Conductor:</label>
                <input type="text" name="nombre_conductor" id="nombre_conductor" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
            </div>

            <div class="mb-3">
                <label for="valor_flete" class="form-label font-medium text-gray-700">Valor Flete:</label>
                <input type="text" name="valor_flete" id="valor_flete" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
            </div>

            <div class="mb-3">
                <label for="fecha_envio" class="form-label font-medium text-gray-700">Fecha Envío:</label>
                <input type="date" name="fecha_envio" id="fecha_envio" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
            </div>

            <div class="mb-3">
                <label for="valor_bultos_calidad_alta" class="form-label font-medium text-gray-700">Valor de Bultos Calidad Alta:</label>
                <input type="number" name="valor_bultos_calidad_alta" id="valor_bultos_calidad_alta" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
            </div>

            <div class="mb-3">
                <label for="valor_bultos_calidad_media" class="form-label font-medium text-gray-700">Valor de Bultos Calidad Media:</label>
                <input type="number" name="valor_bultos_calidad_media" id="valor_bultos_calidad_media" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
            </div>

            <div class="mb-3">
                <label for="valor_bultos_calidad_baja" class="form-label font-medium text-gray-700">Valor de Bultos Calidad Baja:</label>
                <input type="number" name="valor_bultos_calidad_baja" id="valor_bultos_calidad_baja" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
            </div>

            <div class="mb-3">
                <label for="comprador" class="form-label font-medium text-gray-700">Comprador:</label>
                <input type="text" name="comprador" id="comprador" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
            </div>

            <div class="mb-3">
                <label for="estado" class="form-label font-medium text-gray-700">Estado:</label>
                <select name="estado" id="estado" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                    <option value="viaje">Viajando</option>
                    <option value="centroabastos">En Centroabastos</option>
                    <option value="deuda">Deuda</option>
                    <option value="pago">Pagado</option>
                </select>
            </div>

        </div>

        <button type="submit" class="mt-4 w-full bg-blue-600 text-white font-semibold py-2 rounded-md hover:bg-blue-500 transition">Registrar</button>
    </form>
</div>
@endsection
