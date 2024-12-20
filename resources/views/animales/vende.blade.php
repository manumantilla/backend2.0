@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
  <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    <!-- Información Animal -->
    <div class="col-span-2 border border-gray-300 bg-white shadow-lg rounded-lg p-6">
      <h2 class="text-2xl font-semibold text-gray-800 mb-4">Información Animal: <span class="text-blue-600">{{ $animal->nombre }}</span></h2>

      <div class="flex mb-4">
        <label for="peso" class="font-semibold text-gray-700">Último Peso Registrado:</label>
        <input id="peso" class="ml-2 font-semibold text-md text-gray-600" type="text" value="{{ $animal->peso }} kg" readonly>
      </div>

      <div class="flex mb-4">
        <label for="fecha_nacimiento" class="font-semibold text-gray-700">Fecha de Nacimiento:</label>
        <input id="fecha_nacimiento" class="ml-2 font-semibold text-md text-gray-600" type="text" value="{{ $animal->fecha_nacimiento }}" readonly>
      </div>

      <div class="flex mb-4">
        <label for="fecha_ingreso" class="font-semibold text-gray-700">Fecha de Ingreso al Rancho:</label>
        <input id="fecha_ingreso" class="ml-2 font-semibold text-md text-gray-600" type="text" value="{{ $animal->fecha_ingreso }}" readonly>
      </div>

      <!-- Div para el mapa -->
      <div class="m-4" id="map" style="height: 350px;"></div>

      <!-- Botones para seleccionar la vista del mapa -->
      <div class="flex justify-center mb-4 space-x-2">
        <button id="outdoorsView" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">Vista por Metros Sobre Nivel del Mar</button>
        <button id="satelliteView" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 transition">Vista Satelital</button>
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
    <form method="POST" action="{{ route('animales.sell', $animal->id) }}" enctype="multipart/form-data" class="bg-white border border-gray-300 shadow-lg rounded-lg p-6">
      @csrf
      <div>
        <!-- Subir Guía -->
        <div class="mb-4">
          <label for="guia" class="block text-md font-medium mb-2">Subir Guía</label>
          <input id="guia" name="guia" type="file" class="w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-300 p-2">
        </div>

        <!-- Formulario de venta del animal -->
        <h2 class="text-lg font-semibold mb-4">Venta de Animal</h2>

        <!-- Peso del animal a la venta -->
        <div class="mb-4">
          <label for="peso_venta" class="block text-md font-medium mb-2">Peso del Animal a la Venta</label>
          <input id="peso_venta" name="peso_venta" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-300" type="number" placeholder="Ingrese el peso en kg" required>
        </div>

        <!-- Valor por kilo del animal -->
        <div class="mb-4">
          <label for="valor_kilo" class="block text-md font-medium mb-2">Valor por Kilo</label>
          <input id="valor_kilo" name="valor_kilo" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-300" type="number" placeholder="Ingrese el valor por kilo" required>
        </div>

        <!-- Nombre del comprador -->
        <div class="mb-4">
          <label for="nombre_comprador" class="block text-md font-medium mb-2">Nombre del Comprador</label>
          <input id="nombre_comprador" name="nombre_comprador" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-300" type="text" placeholder="Ingrese el nombre del comprador" required>
        </div>

        <!-- Contacto del comprador -->
        <div class="mb-4">
          <label for="contacto_comprador" class="block text-md font-medium mb-2">Contacto del Comprador</label>
          <input id="contacto_comprador" name="contacto_comprador" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-300" type="text" placeholder="Ingrese el contacto del comprador" required>
        </div>

        <!-- Botón para realizar la venta -->
        <div class="text-center mb-4">
          <button type="submit" class="bg-gray-800 text-white hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 transition">Vender</button>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection
