@extends('layouts.app')
@section('content')
<div class="container mx-auto p-6">
  <div class="grid grid-cols-3 gap-6">
    <!-- Información Animal -->
    <div class="col-span-2 border border-black p-4 rounded">
      <h2 class="text-xl font-semibold">Información Animal {{$animal->nombre}}</h2>

      <div class="flex mb-5 text-sm">
        <label for="peso" class="font-semibold">Último Peso Registrado:</label>
        <input id="peso" class="ml-2 font-semibold text-md" type="text" value="{{ $animal->peso }} kg" readonly>
      </div>

      <div class="flex mb-5 text-sm">
        <label for="fecha_nacimiento" class="font-semibold">Fecha de Nacimiento:</label>
        <input id="fecha_nacimiento" class="ml-2 font-semibold text-md" type="text" value="{{ $animal->fecha_nacimiento }}" readonly>
      </div>

      <div class="flex mb-5 text-sm">
        <label for="fecha_ingreso" class="font-semibold">Fecha de Ingreso al Rancho:</label>
        <input id="fecha_ingreso" class="ml-2 font-semibold text-md" type="text" value="{{ $animal->fecha_ingreso }}" readonly>
      </div>

      <!-- Div para el mapa -->
      <div class="m-4" id="map" style="height: 350px;"></div>

      <!-- Botones para seleccionar la vista del mapa -->
      <div class="flex justify-center mb-2">
        <button id="outdoorsView" class="bg-blue-500 text-white px-4 py-2 rounded mr-2">Vista por Metros Sobre Nivel del Mar</button>
        <button id="satelliteView" class="bg-green-500 text-white px-4 py-2 rounded">Vista Satelital</button>
      </div>

      <!-- Script para el mapa con Mapbox -->
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

    <!-- Formulario de venta del animal -->
    <form method="POST" action="{{ route('animales.sell', $animal->id) }}" enctype="multipart/form-data">
      @csrf
      <div class="col-span-1">
        <!-- Subir Guía -->
        <div class="mb-4">
          <label for="guia" class="block text-md font-medium mb-2">Subir Guía</label>
          <input id="guia" name="guia" type="file" class="w-full">
        </div>

        <!-- Formulario de venta del animal -->
        <div class="border border-black p-4 rounded">
          <h2 class="text-lg font-semibold mb-4">Venta de Animal</h2>

          <!-- Peso del animal a la venta -->
          <div class="mb-4">
            <label for="peso_venta" class="block text-md font-medium mb-2">Peso del Animal a la Venta</label>
            <input id="peso_venta" name="peso_venta" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:border-blue-300" type="number" placeholder="Ingrese el peso en kg">
          </div>

          <!-- Valor por kilo del animal -->
          <div class="mb-4">
            <label for="valor_kilo" class="block text-md font-medium mb-2">Valor por Kilo</label>
            <input id="valor_kilo" name="valor_kilo" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:border-blue-300" type="number" placeholder="Ingrese el valor por kilo">
          </div>

          <!-- Nombre del comprador -->
          <div class="mb-4">
            <label for="nombre_comprador" class="block text-md font-medium mb-2">Nombre del Comprador</label>
            <input id="nombre_comprador" name="nombre_comprador" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:border-blue-300" type="text" placeholder="Ingrese el nombre del comprador">
          </div>

          <!-- Contacto del comprador -->
          <div class="mb-4">
            <label for="contacto_comprador" class="block text-md font-medium mb-2">Contacto del Comprador</label>
            <input id="contacto_comprador" name="contacto_comprador" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:border-blue-300" type="text" placeholder="Ingrese el contacto del comprador">
          </div>

          <!-- Botón para realizar la venta -->
          <div class="text-center mb-4">
            <button type="submit" class="bg-gray-800 text-white hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5">Vender</button>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection
