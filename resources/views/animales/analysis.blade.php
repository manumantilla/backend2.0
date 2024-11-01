@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Registro de Peso de Animales</h1>

    @foreach($dataForChart as $animalId => $data)
        <h2 class="text-lg font-bold mb-2">Peso del Animal ID: {{ $animalId }}</h2>

        <canvas id="chart-{{ $animalId }}" width="400" height="200"></canvas>
        
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            const ctx = document.getElementById('chart-{{ $animalId }}').getContext('2d');

            const chartData = {
                labels: {!! json_encode($data['labels']) !!},
                datasets: [{
                    label: 'Peso (kg)',
                    data: {!! json_encode($data['data']) !!},
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderWidth: 2,
                    fill: true,
                }]
            };

            const chartConfig = {
                type: 'line',
                data: chartData,
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Peso (kg)'
                            }
                        },
                        x: {
                            title: {
                                display: true,
                                text: 'Fecha'
                            }
                        }
                    }
                }
            };

            const myChart = new Chart(ctx, chartConfig);
        </script>
    @endforeach
</div>
@endsection
