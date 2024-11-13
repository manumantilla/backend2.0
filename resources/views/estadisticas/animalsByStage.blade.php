@extends('layouts.app')
@section('content')
    <h2>Distribución por Etapa de Animales</h2>
    <div style="width:800px; height:600px; margin:90px;">
    <canvas id="animalsByStageChart"></canvas>
    
    </div>
    <script>
        const data = @json($data);
        const labels = data.map(item => item.etapa);
        const counts = data.map(item => item.count);

        var ctx = document.getElementById('animalsByStageChart').getContext('2d');
        var animalsByStageChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Cantidad de Animales',
                    data: counts,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection