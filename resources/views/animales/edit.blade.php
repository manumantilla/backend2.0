@extends('layouts.app')
@section('content')

<div class="">
    <h1>Editar Animal  &#x1f404</h1>
</div>
<div>
    <form action="{{ route('animales.update', $animal->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="identificacion">Identificacion</label>
            <input type="text" name="identificacion" id="identificacion" class="form-control" value="{{old('identificacion', $animal->identificacion)}}" required></input>
        </div>
        <div class="form-group">
            <label for="especie">Especie</label>
            <input type="text" name="especie" id="especie" class="form-control" value="{{ old('especie',$animal->especie)}}" required></input>
        </div>
        <div class="form-group">
            <label for ="nombre"> Nombre</label>
            <input type="text" name="espnombreecie" id="nombre" class="form-control" value="{{ old('nombre', $animal->nombre)}}" required></input>
        </div>
        <div class="form-group">
            <label for="fecha_nacimiento">Fecha de Nacimiento</label>
            <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control" value="{{old('fecha_nacimiento')}}"></input>
        </div>
        <div class="form-group">
            <label for="fecha_ingreso">Fecha de Ingreso</label>
            <input type="date" name="fecha_ingreso" id="fecha_ingreso" class="form-control" value="{{old('fecha_ingreso',$animal->fecha_ingreso)}}" required></input>
        </div>
        
        <div class="form-group">
            <label for="origen">Origen</label>
            <input type="text" name="origen" id="origen" class="form-control" value="{{ old('origen', $animal->origen) }}">
        </div>
        <div class="form-group">
            <label for="genero">Género</label>
            <select name="genero" id="genero" class="form-control" required>
                <option value="Macho" {{ old('genero', $animal->genero) == 'Macho' ? 'selected' : '' }}>Macho</option>
                <option value="Hembra" {{ old('genero', $animal->genero) == 'Hembra' ? 'selected' : '' }}>Hembra</option>
            </select>
        </div>
        <div class="form-group">
            <label for="estado">Estado</label>
            <select name="estado" id="estado" class="form-control">
                <option value="Activo" {{ old('estado', $animal->estado) == 'Activo' ? 'selected' : '' }}>Activo</option>
                <option value="Vendido" {{ old('estado', $animal->estado) == 'Vendido' ? 'selected' : '' }}>Vendido</option>
                <option value="Fallecido" {{ old('estado', $animal->estado) == 'Fallecido' ? 'selected' : '' }}>Fallecido</option>
            </select>
        </div>
        <div class="form-group">
            <label for="etapa" >Etapa</label>
            <select name="etapa" id="etapa" class="form-control">
                <option value="Cria" {{old('etapa', $animal->etapa) == 'Cria' ? 'selected' : '' }}>Cria</option>
                <option value="Levante" {{old('etapa' $animal->etapa) == 'Levante' ? 'selected' : ''}}>Levante</option>
                <option value="Ceba" old{{old('etapa', $animal->etapa) == 'Ceba' ? 'selected' : ''}}>Ceba</option>
            </select>
        </div>
        <div class="flex justify-end">
                <button type="button" class="mr-4 py-2 px-4 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300">Cancel</button>
                <button type="submit" class="py-2 px-4 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">Save</button>
            </div>
    </form>
</div>

@endsection