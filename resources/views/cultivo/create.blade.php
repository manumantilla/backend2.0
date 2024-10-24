@extends('layouts.app')
@section('content')
<div class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white shadow-md rounded-lg p-8 max-w-4xl w-full">
        <h2 class="text-2xl font-bold text-gray-700 text-center mb-6">Registro de Cultivo &#127805</h2>
        
        <form action="{{ route('cultivo.store') }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-4 gap-4">
            @csrf
            @if ($errors->any())
                <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Fecha de Siembra -->
            <div class="col-span-1">
                <label class="block text-gray-600 text-sm font-semibold mb-2" for="fechasiembra">Fecha Siembra</label>
                <input type="date" name="fechasiembra" id="fechasiembra" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Selecciona fecha" required>
            </div>

            <!-- Fecha de Cosecha -->
            <div class="col-span-1">
                <label class="block text-gray-600 text-sm font-semibold mb-2" for="fechacosecha">Fecha Cosecha</label>
                <input type="date" name="fechacosecha" id="fechacosecha" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Selecciona fecha">
            </div>
            <!---->
            <div class="col-span-1">
                <label class="block text-gray-600 text-sm font-semibold mb-2" for="nombre">Nombre Cultivo </label>
                <input type="text" name="nombre" id="nombre" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Nombre Cultivo (Maiz,Papa, Frijol...) ">
            </div>
            <div class="col-span-1">
                <label class="block text-gray-600 text-sm font-semibold mb-2" for="semilla">Semilla </label>
                <input type="text" name="semilla" id="semilla" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Cantidad en bultos o kg">
            </div>
            <!-- Área -->
            <div class="col-span-2">
                <label class="block text-gray-600 text-sm font-semibold mb-2" for="area">Área (m²)</label>
                <input type="number" name="area" id="area" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="100" required>
            </div>

            <!-- Latitude -->
            <div class="col-span-1">
                <label class="block text-gray-600 text-sm font-semibold mb-2" for="latitude">Latitud</label>
                <input type="text" name="latitude" id="latitude" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="6.2442">
            </div>

            <!-- Longitude -->
            <div class="col-span-1">
                <label class="block text-gray-600 text-sm font-semibold mb-2" for="longitude">Longitud</label>
                <input type="text" name="longitude" id="longitude" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="-75.5812">
            </div>

            <!-- Estado -->
            <div class="col-span-1">
                <label class="block text-gray-600 text-sm font-semibold mb-2" for="estado">Estado</label>
                <select name="estado" id="estado" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="activo">Activo</option>
                    <option value="inactivo">Inactivo</option>
                </select>
            </div>

            <!-- Gasto -->
            <div class="col-span-1">
                <label class="block text-gray-600 text-sm font-semibold mb-2" for="gasto">Costo ($)</label>
                <input type="number" name="gasto" id="gasto" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="1.000.000">
            </div>

            <!-- Bultos de Abono -->
            <div class="col-span-1">
                <label class="block text-gray-600 text-sm font-semibold mb-2" for="abono">Abono</label>
                <input type="number" name="abono" id="abono" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="50">
            </div>

            <!---Nombre-->

            <!-- Foto -->
            <div class="col-span-2">
                <label class="block text-gray-600 text-sm font-semibold mb-2" for="foto">Foto</label>
                <input type="file" name="foto" id="foto" class="w-full px-3 py-2 border border-dashed border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Etapa -->
            <div class="col-span-1">
                <label class="block text-gray-600 text-sm font-semibold mb-2" for="etapa">Etapa</label>
                <select name="etapa" id="etapa" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="semillero">Semillero</option>
                    <option value="desplante">Desplante</option>
                    <option value="enraizamiento">Enraizamiento</option>
                    <option value="engrosamiento">Engrosamiento</option>
                    <option value="cosecha">Cosecha</option>
                </select>
            </div>

            <!-- Rendimiento -->
            <div class="col-span-1">
                <label class="block text-gray-600 text-sm font-semibold mb-2" for="rendimiento">Rendimiento</label>
                <input type="number" name="rendimiento" id="rendimiento" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="200 plantas/m²">
            </div>

            <!-- pH -->
            <div class="col-span-1">
                <label class="block text-gray-600 text-sm font-semibold mb-2" for="ph">pH</label>
                <input type="number" step="0.1" name="ph" id="ph" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="6.5">
            </div>

            <!-- Tratamiento -->
            <div class="col-span-2">
                <label class="block text-gray-600 text-sm font-semibold mb-2" for="tratamiento">Tratamiento</label>
                <textarea name="tratamiento" id="tratamiento" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Descripción del tratamiento"></textarea>
            </div>

            <!-- Botón de Envío -->
            <div class="col-span-1 flex items-end">
                <button type="submit" class="w-full bg-blue-500 text-white font-semibold py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                    Guardar
                </button>
            </div>
        </form>
    </div>

    <!-- Flatpickr JS -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        flatpickr("#fecha_siembra, #fecha_cosecha", {
            altInput: true,
            altFormat: "F j, Y",
            dateFormat: "Y-m-d",
            allowInput: true
        });
    </script>
</div>
@endsection