@extends('layouts.app')

@section('content')
<h2 class="text-2xl font-bold text-center mt-10">Agregar un Nuevo Gasto</h2>
<div class="max-w-4xl mx-auto p-6 bg-white shadow-lg rounded-md mt-5">
    <h2 class="text-lg font-semibold text-gray-700 mb-4">Agregar un Gasto Relacionado</h2>
    <form method="POST" action="{{ route('cultivo.addGasto') }}" enctype="multipart/form-data">
        @csrf
        <div class="items-center grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <!-- For show all the crops -->
            <div>
                <label for="cultivo_id" class="block text-sm font-medium text-gray-700">Cultivo</label>
                <select name="cultivo_id" id="cultivo_id" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    @foreach ($cultivos as $cultivo)
                        <option value="{{ $cultivo->id }}">{{ $cultivo->nombre }}</option>
                    @endforeach          
                </select>
            </div>

            <!-- For update the photo of the bill -->
            <div>
                <label for="foto" class="block text-sm font-medium text-gray-700">Subir Foto Comprobante</label>
                <input type="file" name="foto" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div>
                <label for="tipo" class="block text-sm font-medium text-gray-700">Tipo</label>
                <select name="tipo" id="tipo">
                    <option value="Fertilizante">Fertilizante</option>
                    <option value="Pesticida">Pesticida</option>
                    <option value="Riego">Riego</option>
                    <option value="Transporte">Transporte</option>
                    <option value="Daños Menores">Daños Menores</option>
                </select>
            </div>
            
            <div class="items-center">
                <label for="ciclo" class="block text-sm font-medium text-gray-700">Ciclo</label>
                <select name="ciclo" id="ciclo">
                    <option value="nacimiento">Nacimiento</option>
                    <option value="cura">Cura</option>
                    <option value="abono">Abono</option>
                    <option value="Engrosamiento">Engrosamiento</option>
                </select>
            </div>

            <!-- For describe something -->
            <div>
                <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción</label>
                <input type="text" name="descripcion" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
            </div>

            <!-- Choose the responsable -->
            <div>
                <label for="responsable" class="block text-sm font-medium text-gray-700">Responsable</label>
                <select name="responsable" id="responsable" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    @foreach ($empleados as $empleado)
                        <option value="{{ $empleado->id }}">{{ $empleado->nombre }}</option>                   
                    @endforeach
                </select>
            </div>
            <div>  
                <label for="vendedor" class="block text-sm font-medium text-gray-700">Vendedor</label>
                <input type="text" name="vendedor" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
            </div>
            <!-- Valor -->
            <div>  
                <label for="valor" class="block text-sm font-medium text-gray-700">Valor Final</label>
                <input type="number" name="valor" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
            </div>
        </div>

        <div class="flex justify-end">
            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                Registrar Gasto
            </button>
        </div>
    </form>
</div>
@endsection
