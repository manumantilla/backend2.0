@extends('layouts.app')
@section('content')
<div class="container mx-auto p-6">
  <div class="grid grid-cols-3 gap-6">
    <!-- Información Animal -->
    <div class="col-span-2 border border-black p-4 rounded">
      <h2 class="text-xl font-semibold">Información Animal {{$animal->nombre}}</h2>
      <div class="m-4">
        <img class="rounded"src="{{asset('images/' . $animal->foto)}}">
      </div>
      <label class="flex mb-5 text-sm">Ultimo Peso Registrado: </label><span class="font-semibold text-md" >{{$animal -> peso}}</span>
      
      <label class="flex mb-5 text-sm">Fecha Nacimiento: </label><span class="font-semibold text-md" >{{$animal -> fecha_nacimiento}}</span>
      
      <label class="flex mb-5 text-sm">Fecha Ingreso al rancho</label> <span class="font-semibold text-md" >{{$animal -> fecha_ingreso}}</span>
   

<!-- Div para el mapa -->

<div class="m-4"id="map" style="height: 350px;">

</div>
         <!--Creamos dos botones para scgoer la vista y se les agina un id para diferenciarlos-->
    <div class="flex justify-center mb-2">
            <button id="outdoorsView" class="bg-blue-500 text-blue-500 px-4 py-2 rounded mr-2">Vista por Metros Sobre Nivel del Mar</button>
            <button id="satelliteView" class="bg-green-500 text-blue-500 px-4 py-2 rounded">Vista Satelital</button>
    </div>
    <!--Script for the maps with mapblox--->
    <script>
            mapboxgl.accessToken = 'pk.eyJ1IjoibWRlbGdhZG82ODIiLCJhIjoiY20wc2l4aXF5MGdmeDJqcHQ1cXgxdG5xYyJ9.TdtsJ6sajv7haaFQkrc5Og'; 
            var map = new mapboxgl.Map({
                container: 'map', 
                style: 'mapbox://styles/mapbox/outdoors-v11', 
                center: [{{ $animal->longitude }}, {{ $animal->latitude }}], 
                zoom: 12
            });
            new mapboxgl.Marker()
                .setLngLat([{{ $animal->longitude }}, {{ $animal->latitude }}])
                .addTo(map);
            // Cambiar a vista exterior
            document.getElementById('outdoorsView').addEventListener('click', function() {
                map.setStyle('mapbox://styles/mapbox/outdoors-v11');
            });

            // Cambiar a vista satélite
            document.getElementById('satelliteView').addEventListener('click', function() {
                map.setStyle('mapbox://styles/mapbox/satellite-v9');
            });
    </script>
</div>
    <form method="POST" action="{{ route('animales.sell', $animal->id)}}" enctype="multipart/form-data">
            
        <!-- Form Section -->
        <div class="col-span-1">
        <!-- Subir Guía -->
        <div class="border border-black p-4 rounded mb-6">
            <h2 class="text-xl font-semibold">Subir Guía en PDF o Img</h2>
            <h6>{{$animal-> id}}</h6>
            <label class="mb-4 text-sm">Recordar sacarla en la UMATA</label>
            <!--Input type file sty-->
            <div class="flex items-center justify-center w-full">
                <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                        <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                        </svg>
                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                        <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                    </div>
                    <input id="dropzone-file" type="file" class="hidden" />
                </label>
            </div> 

        </div>

        <!-- Animal Sale Form -->
        <div class="border border-black p-4 rounded">
        <h2 class="text-lg font-semibold mb-4">Venta de Animal</h2>

        <!-- Peso Animal a la Venta -->
        <div class="mb-4">
            <label class="block text-md font-medium mb-2" for="peso-animal">Peso Animal a la Venta</label>
            <input name="peso" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:border-blue-300" id="peso-animal" type="number" placeholder="Ingrese el peso en kg">
        </div>

        <!-- Valor Kilo de Animal -->
        <div class="mb-4">
            <label class="block text-md font-medium mb-2" for="valor-kilo">Valor Kilo de Animal</label>
            <input name="valor_kilo"class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:border-blue-300" id="valor-kilo" type="number" placeholder="Ingrese el valor por kilo">
        </div>

        <!-- Nombre Comprador -->
        <div class="mb-4">
            <label class="block text-md font-medium mb-2" for="nombre-comprador">Nombre Comprador</label>
            <input name="nombre_comprador" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:border-blue-300" id="nombre-comprador" type="text" placeholder="Ingrese el nombre del comprador">
        </div>

        <!-- Contacto Comprador -->
        <div class="mb-4">
            <label class="block text-md font-medium mb-2" for="contacto-comprador">Contacto Comprador</label>
            <input name="contacto_comprador"class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:border-blue-300" id="contacto-comprador" type="text" placeholder="Ingrese el contacto del comprador">
        </div>
        <div style="a"class="text-center mb-4">
        <button type="button" class=" text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Vender</button>
        </div>
    </div>

        
        </div>
        </div>
    </div>

    </form>
    </div>

</div>
@endsection