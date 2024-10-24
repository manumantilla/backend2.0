@extends('layouts.app')
@section('content')

<div style="width:100%;" class="bg-gray-100">
    <h1 class="text-center text-2xl font-bold py-6">Agregar un nuevo Animal</h1>

    <div class="max-w-4xl mx-auto p-6 bg-white shadow-md rounded-md mt-10">
        <h2 class="text-lg font-semibold text-gray-700 mb-4">Animal Information</h2>
        <p class="text-sm text-gray-500 mb-6">Record the animal's information and remember to upload the guide if necessary.</p>

        <form method="POST" action="{{ route('animales.store') }} "enctype="multipart/form-data">
            @csrf <!-- Token CSRF para proteger contra ataques -->

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <!-- Todos los campos de entrada que ya tienes -->
                <!-- Agregar aquí el resto de campos, como ya los tienes en el código anterior -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" name="nombre" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Species</label>
                    <input type="text" name="especie" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Race</label>
                    <input type="text" name="raza" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                <!-- Campos de Fecha -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Date of Birth</label>
                        <input type="date" name="fecha_nacimiento" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Date of Admission</label>
                    <input type="date" name="fecha_ingreso" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                </div>
            </div>

            <!-- Campos adicionales -->
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700">Origen</label>
                <input type="text" name="origen" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" placeholder="Bga, Lebrija, Socorro..">
            </div>

            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700">Estado</label>
                <select name="estado" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="Activo">Activo</option>
                    <option value="Fallecido">Fallecido</option>
                    <option value="Vendido">Vendido</option>
                </select>
            </div>
            <div class="mb-6">
                <label for="etapa" class="block text-sm font-medium text-gray-600">Etapa</label>
                <select name="etapa" id="etapa" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="Ceba">Ceba</option>
                    <option value="Levante">Levante</option>
                    <option value="Engorde">Engorde</option>
                </select>
            </div>

            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700">Genero</label>
                <select name="genero" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="Hembra">Hembra</option>
                    <option value="Macho">Macho</option>
                </select>
            </div>

            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700">Peso</label>
                <input type="text" name="peso" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" placeholder="In kg or arrobas">
            </div>
            
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700">Identificación</label>
                <input type="text" name="identificacion" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" placeholder="ej: 419-C-4">
            </div>
            <!--Longitu-->
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700">Longitud</label>
                <input type="text" name="longitude" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" placeholder="ej: 419-C-4">
            </div>
               <!--Longitu-->
               <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700">Latitud</label>
                <input type="text" name="latitude" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" placeholder="ej: 419-C-4">
            </div>
            <!--Campo para subir una foto-->
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700">Foto</label>
                <input type="file" name="foto" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <div class="flex justify-end">
                <button type="button" class="mr-4 py-2 px-4 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300">Cancel</button>
                <button type="submit" class="py-2 px-4 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">Save</button>
            </div>
            @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

        </form>
    </div>
</div>

@endsection
