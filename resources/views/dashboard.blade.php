<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
 

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Bienvenido!") }}

                    <div class="mt-6">
                        <h3 class="text-lg font-semibold">Panel de Control</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mt-4">
                            <!-- Enlace a gestión de Animales -->
                            <a href="{{ route('animales.index') }}" class="block p-4 bg-blue-500 text-white rounded-lg shadow hover:bg-blue-600">
                                <h4 class="font-semibold">Gestión de Animales</h4>
                                <p>Ver y gestionar todos los animales.</p>
                            </a>

                            <!-- Enlace a gestión de Cultivos -->
                            <a href="{{ route('cultivo.showFormCrop') }}" class="block p-4 bg-green-500 text-white rounded-lg shadow hover:bg-green-600">
                                <h4 class="font-semibold">Gestión de Cultivos</h4>
                                <p>Crear y gestionar cultivos.</p>
                            </a>

                            <!-- Enlace a Envíos -->
                            <a href="{{ route('envios.index') }}" class="block p-4 bg-yellow-200 text-black rounded-lg shadow hover:bg-orange-600">
                                <h4 class="font-semibold">Gestión de Envíos</h4>
                                <p>Ver y gestionar los envíos.</p>
                            </a>

                            <!-- Enlace a Gastos de Cultivos -->
                            <a href="{{ route('cultivo.gasto') }}" class="block p-4 bg-yellow-500 text-white rounded-lg shadow hover:bg-yellow-600">
                                <h4 class="font-semibold">Gastos de Cultivos</h4>
                                <p>Registrar y gestionar gastos relacionados.</p>
                            </a>

                            <!-- Enlace a Análisis -->
                            <a href="{{ route('envios.ganancia', ['cultivoId' => 1]) }}" class="block p-4 bg-purple-500 text-white rounded-lg shadow hover:bg-purple-600">
                                <h4 class="font-semibold">Análisis de Ganancias</h4>
                                <p>Ver análisis de ganancias por cultivo.</p>
                            </a>

                            <!-- Enlace a Perfil -->
                            <a href="{{ route('profile.edit') }}" class="block p-4 bg-gray-500 text-white rounded-lg shadow hover:bg-gray-600">
                                <h4 class="font-semibold">Perfil</h4>
                                <p>Editar tu perfil.</p>
                            </a>
                            <a href="{{ route('animals.stage') }}" class="block p-4 bg-pink-500 text-white rounded-lg shadow hover:bg-gray-600">
                                <h4 class="font-semibold">Estado Animal</h4>
                                <p>Estado de los animales</p>
                            </a>
                            <a href="{{ route('cultivo.trabajos') }}" class="block p-4 bg-gray-500 text-white rounded-lg shadow hover:bg-gray-600">
                                <h4 class="font-semibold">Trabajos</h4>
                                <p>Trabajos o Actividadesd</p>
                            </a>

                            <a href="{{ route('animals.stage') }}" class="block p-6 bg-red-500 text-white rounded-lg shadow hover:bg-red-600 transition">
                                <h4 class="text-lg font-semibold mb-2">Gráfica por Etapa</h4>
                                <p>Animales por etapa de desarrollo</p>
                            </a>

                            <!-- Botón 2: Gráfica de Géneros -->
                            <a href="{{ route('animals.gender') }}" class="block p-6 bg-red-500 text-white rounded-lg shadow hover:bg-red-600 transition">
                                <h4 class="text-lg font-semibold mb-2">Gráfica Géneros</h4>
                                <p>Género de animales registrados</p>
                            </a>

                            <!-- Botón 3: Peso Promedio por Etapa -->
                            <a href="{{ route('animals.average_weight_by_stage') }}" class="block p-6 bg-purple-400 text-white rounded-lg shadow hover:bg-purple-600 transition">
                                <h4 class="text-lg font-semibold mb-2">Peso Promedio por Etapa</h4>
                                <p>Peso promedio de animales por etapa</p>
                            </a>

                            <!-- Botón 4: Animales por Estado -->
                            <a href="{{ route('animals.status') }}" class="block p-6 bg-gray-500 text-white rounded-lg shadow hover:bg-gray-600 transition">
                                <h4 class="text-lg font-semibold mb-2">Gráfica por Estado</h4>
                                <p>Estado de animales registrados</p>
                            </a>

                            <!-- Botón 5: Crops por Estado -->
                            <a href="{{ route('animals.cropsbystatus') }}" class="block p-6 bg-pink-300 text-white rounded-lg shadow hover:bg-pink-600 transition">
                                <h4 class="text-lg font-semibold mb-2">Crops por Estado</h4>
                                <p>Crops por estado</p>
                            </a>

                            <!-- Botón 6: Gasto Promedio por Tipo -->
                            <a href="{{ route('animals.average_expense_by_type') }}" class="block p-6 bg-blue-500 text-white rounded-lg shadow hover:bg-blue-600 transition">
                                <h4 class="text-lg font-semibold mb-2">Gasto Promedio por Tipo</h4>
                                <p>Gasto promedio por tipo</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </x-slot>
</x-app-layout>
