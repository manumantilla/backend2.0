@extends('layouts.app')
@section('content')
<h1>Fumigacio o Abono</h1>
<div class="max-w-4xl mx-auto p-6 bg-white shadow-md rounded-md mt-10">
    <h2 class="text-lg font-semibold text-gray-700">Cultivo</h2>
    <form action="{{route('cultivo.add'}}">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div>
                <label for="nrotrabajadores" class="block text-sm font-medium text-gray-700">Numero Trabajadores</label>
                <input name="nrotrabajadores" type="text" class="mt-1 block border border-gray-200 rounded-md">
            </div>
            <div>
                <label for="costo_trabajadores" class="block text-sm font-medium text-gray-700">Costo Trabajadores</label>
                <input name="costo_trabajadores" type="number" class="mt-1 block border border-gray-200 rounded-md">
            </div>
            <div>
                <label for="costos" class="block text-sm font-medium text-gray-700">Costos</label>
                <input name="costos" type="text" class="mt-1 block border border-gray-200 rounded-md">
            </div>
            <div>
                <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripcion</label>
                <input name="descripcion" type="text" class="mt-1 block border border-gray-200 rounded-md">
            </div>
            <!--Div for Tipo de aplicacion-->
            <div>
                <label for="tipo" class="block text-sm font-medium text-gray-700">Tipo</label>
                <select name="tipo" id="tipo">
                    <option value="fumigacion">Fumigacion</option>
                    <option value="abono">Abono</option>
                </select>
            </div>
            <!---Campo para litros-->
            <div id="litrosField" class="mb-6" style="display:none;">
                <label for="litros" class="block text-sm font-medium text-gray-600">Cantidad de Litros</label>
                <input name="litros" type="number" class="mt-1 block w-full border border-gray-300 rounded-md">
            </div>
            <!---Campo para bultos:-->
            <div id="bultosField" class="mb-6" style="display:none;">
                <label for="bultos" class="block text-sm font-medium text-gray-700">Cantidad de Bultos</label>
                <input name="bultos" type="number" class="mt-1 block w-full border border-gray-200 rounded-md">
            </div>

        </div>

    </form>

</div>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function(){
        $('#tipo').change(function(){
            /*
            A la var selectedOption
            */
            var selectedOption = $(this).val();
            if(selectedOption ==='fumigacion'){
                $('#litrosField').show();
                $('#bultosField').hide();
            } else if (selectedOption === 'abono'){
                $('#litrosField').hide();
                $('#bultosField').show();
            }
            else{
                $('#litrosField').hide();
                $('#bultosField').hide();
            }
        });
    });
</script>