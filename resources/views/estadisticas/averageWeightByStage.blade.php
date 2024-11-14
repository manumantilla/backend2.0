@extends('layouts.app')
@section('content')
<body class="bg-gray-50">

    <div class="container mx-auto p-6">
        <h2 class="text-3xl font-bold text-center text-blue-600 mb-6">Peso Promedio por Etapa de Animales</h2>

        <!-- Gráfico de Barras -->
        <div style="width:800px; height:600px;"class="flex justify-center mb-8">
            <canvas id="averageWeightByStageChart" ></canvas>
        </div>

        <!-- Tabla con los datos -->
        <div class="bg-white shadow-md rounded-lg p-6">
            <h3 class="text-2xl font-semibold text-blue-600 mb-4">Resumen de Peso Promedio por Etapa</h3>
            <table class="min-w-full table-auto text-left">
                <thead class="border-b">
                    <tr>
                        <th class="py-2 px-4 text-gray-700">Etapa del Animal</th>
                        <th class="py-2 px-4 text-gray-700">Peso Promedio</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $item)
                        <tr class="border-b">
                            <td class="py-2 px-4 text-gray-600">{{ $item->etapa }}</td>
                            <td class="py-2 px-4 text-gray-600">{{ number_format($item->average_weight, 2) }} kg</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        // Preparar los datos para el gráfico
        const data = @json($data);
        const labels = data.map(item => item.etapa);
        const averages = data.map(item => item.average_weight);

        // Crear el gráfico de barras
        var ctx = document.getElementById('averageWeightByStageChart').getContext('2d');
        var averageWeightByStageChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Peso Promedio (kg)',
                    data: averages,
                    backgroundColor: 'rgba(75, 192, 192, 0.6)', // Color de las barras
                    borderColor: 'rgba(75, 192, 192, 1)', // Color del borde
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return value + ' kg'; // Formatear el valor con 'kg'
                            }
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false // Ocultar la leyenda
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return tooltipItem.raw.toFixed(2) + ' kg'; // Tooltip con formato de 2 decimales
                            }
                        }
                    }
                }
            }
        });
    </script>

@endsection