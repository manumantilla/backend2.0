@extends('layouts.app')
@section('content')

    <div class="container mx-auto p-6">
        <h2 class="text-3xl font-bold text-center text-blue-600 mb-6">Gasto Promedio por Tipo de Gasto</h2>

        <!-- Gráfico -->
        <div style="width:800px; height:600px;"class="flex justify-center mb-8">
            <canvas id="averageExpenseByTypeChart" class="w-full max-w-4xl"></canvas>
        </div>

        <!-- Tabla con los datos -->
        <div class="bg-white shadow-md rounded-lg p-6">
            <h3 class="text-2xl font-semibold text-blue-600 mb-4">Resumen de Gastos Promedios</h3>
            <table class="min-w-full table-auto text-left">
                <thead class="border-b">
                    <tr>
                        <th class="py-2 px-4 text-gray-700">Tipo de Gasto</th>
                        <th class="py-2 px-4 text-gray-700">Gasto Promedio</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $item)
                        <tr class="border-b">
                            <td class="py-2 px-4 text-gray-600">{{ $item->tipo }}</td>
                            <td class="py-2 px-4 text-gray-600">${{ number_format($item->average_expense, 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        // Preparar los datos para el gráfico
        const data = @json($data);
        const labels = data.map(item => item.tipo);
        const averages = data.map(item => item.average_expense);

        // Crear el gráfico
        var ctx = document.getElementById('averageExpenseByTypeChart').getContext('2d');
        var averageExpenseByTypeChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Gasto Promedio',
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
                                return '$' + value.toLocaleString(); // Formatear el valor con $
                            }
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return '$' + tooltipItem.raw.toLocaleString(); // Tooltip con formato
                            }
                        }
                    }
                }
            }
        });
    </script>


@endsection