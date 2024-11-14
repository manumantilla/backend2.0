@extends('layouts.app')

@section('content')
<div class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white shadow-md rounded-lg p-8 max-w-4xl w-full">
        <h2 class="text-2xl font-bold text-gray-700 text-center mb-6">
            @isset($cultivo)
                Editar Cultivo &#127805;
            @else
                Registro de Cultivo &#127805;
            @endisset
        </h2>
        
        <form action="{{ isset($cultivo) ? route('cultivo.update', $cultivo->id) : route('cultivo.store') }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-4 gap-4">
            @csrf
            @isset($cultivo)
                @method('PUT') <!-- Usamos PUT cuando estamos editando -->
            @endisset

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
                <input type="date" name="fechasiembra" id="fechasiembra" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Selecciona fecha" value="{{ old('fechasiembra', $cultivo->fechasiembra ?? '') }}" required>
            </div>

            <!-- Fecha de Cosecha -->
            <div class="col-span-1">
                <label class="block text-gray-600 text-sm font-semibold mb-2" for="fechacosecha">Fecha Cosecha</label>
                <input type="date" name="fechacosecha" id="fechacosecha" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Selecciona fecha" value="{{ old('fechacosecha', $cultivo->fechacosecha ?? '') }}">
            </div>

            <!-- Nombre Cultivo -->
            <div class="col-span-1">
                <label class="block text-gray-600 text-sm font-semibold mb-2" for="nombre">Nombre Cultivo</label>
                <input type="text" name="nombre" id="nombre" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Nombre Cultivo (Maiz, Papa, Frijol...)" value="{{ old('nombre', $cultivo->nombre ?? '') }}">
            </div>

            <!-- Semilla -->
            <div class="col-span-1">
                <label class="block text-gray-600 text-sm font-semibold mb-2" for="semilla">Semilla</label>
                <input type="text" name="semilla" id="semilla" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Cantidad en bultos o kg" value="{{ old('semilla', $cultivo->semilla ?? '') }}">
            </div>

            <!-- Área -->
            <div class="col-span-2">
                <label class="block text-gray-600 text-sm font-semibold mb-2" for="area">Área (m²)</label>
                <input type="number" name="area" id="area" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="100" value="{{ old('area', $cultivo->area ?? '') }}" required>
            </div>

            <!-- Latitude -->
            <div class="col-span-1">
                <label class="block text-gray-600 text-sm font-semibold mb-2" for="latitude">Latitud</label>
                <input type="text" name="latitude" id="latitude" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="6.2442" value="{{ old('latitude', $cultivo->latitude ?? '') }}">
            </div>

            <!-- Longitude -->
            <div class="col-span-1">
                <label class="block text-gray-600 text-sm font-semibold mb-2" for="longitude">Longitud</label>
                <input type="text" name="longitude" id="longitude" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="-75.5812" value="{{ old('longitude', $cultivo->longitude ?? '') }}">
            </div>

            <!-- Estado -->
            <div class="col-span-1">
                <label class="block text-gray-600 text-sm font-semibold mb-2" for="estado">Estado</label>
                <select name="estado" id="estado" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="activo" {{ (old('estado', $cultivo->estado ?? '') == 'activo') ? 'selected' : '' }}>Activo</option>
                    <option value="inactivo" {{ (old('estado', $cultivo->estado ?? '') == 'inactivo') ? 'selected' : '' }}>Inactivo</option>
                </select>
            </div>

            <!-- Gasto -->
            <div class="col-span-1">
                <label class="block text-gray-600 text-sm font-semibold mb-2" for="gasto">Costo ($)</label>
                <input type="number" name="gasto" id="gasto" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="1.000.000" value="{{ old('gasto', $cultivo->gasto ?? '') }}">
            </div>

            <!-- Bultos de Abono -->
            <div class="col-span-1">
                <label class="block text-gray-600 text-sm font-semibold mb-2" for="abono">Abono</label>
                <input type="number" name="abono" id="abono" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="50" value="{{ old('abono', $cultivo->abono ?? '') }}">
            </div>

            <!-- Foto -->
            <div class="col-span-2">
                <label class="block text-gray-600 text-sm font-semibold mb-2" for="foto">Foto</label>
                <input type="file" name="foto" id="foto" class="w-full px-3 py-2 border border-dashed border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Etapa -->
            <div class="col-span-1">
                <label class="block text-gray-600 text-sm font-semibold mb-2" for="etapa">Etapa</label>
                <select name="etapa" id="etapa" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="semillero" {{ (old('etapa', $cultivo->etapa ?? '') == 'semillero') ? 'selected' : '' }}>Semillero</option>
                    <option value="desplante" {{ (old('etapa', $cultivo->etapa ?? '') == 'desplante') ? 'selected' : '' }}>Desplante</option>
                    <option value="enraizamiento" {{ (old('etapa', $cultivo->etapa ?? '') == 'enraizamiento') ? 'selected' : '' }}>Enraizamiento</option>
                    <option value="engrosamiento" {{ (old('etapa', $cultivo->etapa ?? '') == 'engrosamiento') ? 'selected' : '' }}>Engrosamiento</option>
                    <option value="cosecha" {{ (old('etapa', $cultivo->etapa ?? '') == 'cosecha') ? 'selected' : '' }}>Cosecha</option>
                </select>
            </div>

            <!-- Rendimiento -->
            <div class="col-span-1">
                <label class="block text-gray-600 text-sm font-semibold mb-2" for="rendimiento">Rendimiento</label>
                <input type="number" name="rendimiento" id="rendimiento" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="200 plantas/m²" value="{{ old('rendimiento', $cultivo->rendimiento ?? '') }}">
            </div>

            <!-- pH -->
            <div class="col-span-1">
                <label class="block text-gray-600 text-sm font-semibold mb-2" for="ph">pH</label>
                <input type="number" step="0.1" name="ph" id="ph" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="6.5" value="{{ old('ph', $cultivo->ph ?? '') }}">
            </div>

            <!-- Tratamiento -->
            <div class="col-span-2">
                <label class="block text-gray-600 text-sm font-semibold mb-2" for="tratamiento">Tratamiento</label>
                <textarea name="tratamiento" id="tratamiento" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Descripción del tratamiento">{{ old('tratamiento', $cultivo->tratamiento ?? '') }}</textarea>
            </div>

            <!-- Botón de Envío -->
            <div class="col-span-1 flex items-end">
                <button type="submit" class="w-full bg-blue-500 text-white font-semibold py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                    @isset($cultivo)
                        Actualizar
                    @else
                        Guardar
                    @endisset
                </button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        flatpickr("#fechasiembra, #fechacosecha", {
            altInput: true,
            altFormat: "F j, Y",
            dateFormat: "Y-m-d",
            allowInput: true
        });
    </script>
</div>
@endsection
