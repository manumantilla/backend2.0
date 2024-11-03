@extends('layouts.app')
@section('content')
<h1> Gastos Totales: {{number_format($gastos_totales)}}</h1>

<h1>Ganancia Total:{{number_format($ganancia_total)}}</h1>
@endsection