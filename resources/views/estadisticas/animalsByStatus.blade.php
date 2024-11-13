@extends('layouts.app')
@section('content')
<div class="container mx-auto p-6">
        <h2 class="text-3xl font-bold text-center text-blue-600 mb-6">Estado de los Animales</h2>

        <!-- Gráfico de Tortas -->
        <div class="flex justify-center mb-8">
            <canvas id="animalsByStatusChart" class="w-full max-w-4xl"></canvas>
        </div>

        <!-- Tabla con los datos -->
        <div class="bg-white shadow-md rounded-lg p-6">
            <h3 class="text-2xl font-semibold text-blue-600 mb-4">Resumen de Animales por Estado</h3>
            <table class="min-w-full table-auto text-left">
                <thead class="border-b">
                    <tr>
                        <th class="py-2 px-4 text-gray-700">Estado del Animal</th>
                        <th class="py-2 px-4 text-gray-700">Cantidad</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $item)
                        <tr class="border-b">
                            <td class="py-2 px-4 text-gray-600">{{ $item->estado }}</td>
                            <td class="py-2 px-4 text-gray-600">{{ $item->count }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        // Preparar los datos para el gráfico
        const data = @json($data);
        const labels = data.map(item => item.estado);
        const counts = data.map(item => item.count);

        // Crear el gráfico de torta
        var ctx = document.getElementById('animalsByStatusChart').getContext('2d');
        var animalsByStatusChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Estado de los Animales',
                    data: counts,
                    backgroundColor: ['rgba(54, 162, 235, 0.6)', 'rgba(255, 99, 132, 0.6)', 'rgba(75, 192, 192, 0.6)'],
                    borderColor: ['rgba(54, 162, 235, 1)', 'rgba(255, 99, 132, 1)', 'rgba(75, 192, 192, 1)'],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return tooltipItem.raw + ' animales'; // Tooltip con la cantidad de animales
                            }
                        }
                    }
                }
            }
        });
    </script>
@endsection
