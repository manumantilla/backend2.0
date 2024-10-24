@extends('layouts.app')
@section('content')
<h2>Agregar un Nuevo Gasto</h2>
<div class="max-w-4xl mx-auto p-6 bg-white shadow-md rounded-md mt-10">
    <h2 class="text-lg font-semibold text-gray-700 mb-4">Agregar un Gasto Relacionado</h2>
    <form method="POST" action="{{route('cultivo.addGasto')}}" enctype="multipart/form-data">
        @csrf
        <div class="grid grid-cols-1 gap-6 mb-6">
            <!--For show all the crops-->
            <div>
                <label for="cultivo_id" class="block text-sm font-medium text-gray-700">Cultivo</label>
                <select name="cultivo_id" id="cultivo_id">
                @foreach ($cultivos as cultivo)
                    <option value="{{$cultivo->id}}">{{$cultivo->nombre}}</option>
                @endforeach          
                </select>

            </div>
            <!--For update the photo of the bill-->
            <div class="">
                <label for="foto" class="block text-sm font-medium text-gray-700">Subir Foto Comprobante</label>
                <input type="file" name="foto" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"></input->
            </div>
            <!--For describe something-->
            <div >
                <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción</label>
                <input type="text" name="descripción" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"></input->
            </div>
            <!--Choose the responsable-->
            <div >
                <label for="responsable" class="block text-sm font-medium text-gray-700">Responsable</label>
                <select name="responsable" id="responsable">
                    @foreach ($empleados as $empleado)
                        <option value="{{$empleado->id}}">{{$empleado->nombre}}</option>                   
                    @endforeach
                </select>
            </div>
            <!--Valor-->
            <div>  
                <label for="valor" class="block text-sm font-medium text-gray-700">Valor Final</label>
                <input type="number" name="valor" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"></input->
            </div>
            
        </div>

    </form>
    

</div>

@endsection