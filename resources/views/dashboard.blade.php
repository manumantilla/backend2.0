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
                            <a href="{{ route('animals.stage') }}" class="block p-4 bg-gray-500 text-white rounded-lg shadow hover:bg-gray-600">
                                <h4 class="font-semibold">Estado Aniaml</h4>
                                <p>Estado de los animales</p>
                            </a>
                            <a href="{{ route('animals.gender') }}" class="block p-4 bg-gray-500 text-white rounded-lg shadow hover:bg-gray-600">
                                <h4 class="font-semibold">Grafica Generos</h4>
                                <p>Genero de animales registrados</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </x-slot>
</x-app-layout>
