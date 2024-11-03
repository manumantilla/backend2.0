@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-3xl font-bold mb-6">Relacionar Trabajador con Trabajo</h1>

    <form action="{{ route('cultivo.relacionar') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
        @csrf
        @if ($errors->any())
                <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Trabajo: {{$trabajo->descripcion}}</label>
        </div>
        <div class="mb-4">
            <input name="trabajo_id" value="{{$trabajo->id}}">
        </div>

        <div class="mb-4">
            <label for="empleado_id" class="block text-gray-700 font-bold mb-2">Trabajador:</label>
            <select name="empleado_id" id="empleado_id" class="w-full border-gray-300 rounded-md">
                @foreach($empleados as $empleado)
                    <option value="{{ $empleado->id }}">{{ $empleado->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="descripcion" class="block text-gray-700 font-bold mb-2">Descripción:</label>
            <textarea name="descripcion" id="descripcion" class="w-full border-gray-300 rounded-md" rows="4"></textarea>
        </div>

        <div class="mb-4">
            <label for="pago" class="block text-gray-700 font-bold mb-2">Pago:</label>
            <input type="number" name="pago" id="pago" class="w-full border-gray-300 rounded-md" step="0.01">
        </div>

        <div class="flex justify-end">
            <button type="submit" class="bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-700">Guardar</button>
        </div>
    </form>
</div>
@endsection
