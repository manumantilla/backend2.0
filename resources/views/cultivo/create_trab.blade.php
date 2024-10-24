@extends('layouts.app')
@section('content')
<div class="max-w-4xl mx-auto p-6 bg-white shadow-md rounded-md mt-10">
    <h2 class="text-lg font-semibold text-gray-700 mb.4">Datos Personales</h2>
    <p class="text-sm text-gray-600 mb-4">Registrar la informacion personal de los trabajadores</p>
    <form action="{{route('cultivo.addEmploye')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="grid grid-cols-2 gap-6 mb-6">
            <div>
                <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
                <input type="text" name="nombre" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <div>
                <label for="cedula" class="block text-sm font-medium text-gray-700">Cedula</label>
                <input type="text" name="cedula" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <div>
                <label for="numero" class="block text-sm font-medium text-gray-700">Numero</label>
                <input type="text" name="numero" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <div>
                <label for="numero_emergencia" class="block text-sm font-medium text-gray-700">Numero de Emergencia</label>
                <input type="text" name="numero_emergencia" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <div>
                <label for="direccion" class="block text-sm font-medium text-gray-700">Direccion</label>
                <input type="text" name="direccion" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <div>
                <label for="foto" class="block text-sm font-medium text-gray-700">Foto</label>
                <input type="file" name="foto" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <div>
                <label for="fecha_inicio" class="block text-sm font-medium text-gray-700">Fecha Inicio</label>
                <input type="date" name="fecha_inicio" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <div>
                <label for="tipo_contrato" class="block text-sm font-medium text-gray-700">Tipo Contrato</label>
                <select name="tipo_contrato" id="tipo_contrato">
                    <option value="Horas">Por Horas</option>
                    <option value="Prestacion_de_servicios" class="">Prestacion de Servicios</option>
                    <option value="Planta" class="">Planta/Socio</option>
                </select>
            </div>
            <div>
                <label for="estado" class="block text-sm font-medium text-gray-700">Estado</label>
                <select name="estado" id="estado">
                    <option value="Activo">Activo</option>
                    <option value="Inactivo" class="">Inactivo</option>
                    <option value="Enfermo" class="">Enfermo</option>
                </select>
            </div>
            <div>
                <label for="nss" class="block text-sm font-medium text-gray-700">Numero de Seguridad Social</label>
                <input type="text" name="nss" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <button type="sumbit" class="mr-4 py-2 px-4 bg-gray-200 text-gray-700 rounded-md hover:bg-indigo-700">Guardar</button>
            
        </div>
    </form>
    
</div>
@endsection