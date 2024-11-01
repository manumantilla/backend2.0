@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-10 p-5 bg-white shadow-lg rounded-lg max-w-lg">
    <h1 class="text-2xl font-bold text-center mb-4">Registrar Trabajo</h1>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('cultivo.addTrabajo', $cultivo->id) }}" method="POST">
        @csrf
        @method('post')

        <div class="mb-4">
            <label for="tipo" class="block text-sm font-medium text-gray-700">Tipo de Trabajo:</label>
            <select name="tipo" id="tipo" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                <option value="" disabled selected>Selecciona un tipo de trabajo</option>
                <option value="arado">Arado</option>
                <option value="fertilizacion inicial">Fertilización Inicial</option>
                <option value="abono">Abono</option>
                <option value="riego">Riego</option>
                <option value="tratamiento">Tratamiento</option>
                <option value="cosecha">Cosecha</option>
                <option value="post-cosecha">Post-Cosecha</option>
            </select>
            @error('tipo')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="fecha_inicio" class="block text-sm font-medium text-gray-700">Fecha de Inicio:</label>
            <input type="date" name="fecha_inicio" id="fecha_inicio" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
            @error('fecha_inicio')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="fecha_fin" class="block text-sm font-medium text-gray-700">Fecha de Fin:</label>
            <input type="date" name="fecha_fin" id="fecha_fin" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
            @error('fecha_fin')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción:</label>
            <input type="text" name="descripcion" id="descripcion" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
            @error('descripcion')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="ubicacion" class="block text-sm font-medium text-gray-700">Ubicación:</label>
            <input type="text" name="ubicacion" id="ubicacion" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
            @error('ubicacion')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="estado" class="block text-sm font-medium text-gray-700">Estado:</label>
            <select name="estado" id="estado" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                <option value="" disabled selected>Selecciona el estado</option>
                <option value="pendiente">Pendiente</option>
                <option value="en_trabajo">En Trabajo</option>
                <option value="terminada">Terminada</option>
            </select>
            @error('estado')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="prioridad" class="block text-sm font-medium text-gray-700">Prioridad:</label>
            <select name="prioridad" id="prioridad" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                <option value="" disabled selected>Selecciona la prioridad</option>
                <option value="baja">Baja</option>
                <option value="media">Media</option>
                <option value="alta">Alta</option>
            </select>
            @error('prioridad')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="w-full bg-blue-600 text-white font-semibold py-2 rounded-md hover:bg-blue-500 transition">Registrar Trabajo</button>
    </form>
</div>
@endsection
