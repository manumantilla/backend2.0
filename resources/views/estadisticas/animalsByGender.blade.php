@extends('layouts.app')
@section('content')
    <h2>Distribución por Género de Animales</h2>
    <div style="width:800px; height:600px; margin:90px;">
    <canvas id="animalsByGenderChart"></canvas>
    
    </div>

    <script>
        const data = @json($data);
        const labels = data.map(item => item.genero);
        const counts = data.map(item => item.count);

        var ctx = document.getElementById('animalsByGenderChart').getContext('2d');
        var animalsByGenderChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Cantidad de Animales',
                    data: counts,
                    backgroundColor: ['rgba(54, 162, 235, 0.5)', 'rgba(255, 99, 132, 0.5)'],
                    borderColor: ['rgba(54, 162, 235, 1)', 'rgba(255, 99, 132, 1)'],
                    borderWidth: 1
                }]
            }
        });
    </script>
@endsection