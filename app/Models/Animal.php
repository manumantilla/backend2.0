<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    
    use HasFactory;
    protected $table = 'animals';
    protected $fillable = [
        'identificacion',
        'nombre',
        'especie',
        'raza',
        'fecha_nacimiento',
        'fecha_ingreso',
        'origen',
        'genero',
        'etapa',
        'estado',
        'peso',
        'latitude',
        'longitude',
        'foto',
    ];
    /*Relacion con el modelo RegistroMedico 
        Aca le estamos diciendo que cuando se llame esta funcion
        se tiene que retornar todos los registros medicos segun el id del animal
        si un animal tiene 20 registros medicos esta funciona los buscara y los retornara
    */
    public function registrosMedicos(){
        return $this->hasMany(RegistroMedico::class, 'animal_id');
    }
}
