<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cultivo extends Model
{
    use HasFactory;
    protected $table ='cultivo';
    protected $fillable = [
        'nombre', 'fecha_siembra', 'fecha_cosecha', 'area', 'estado',
        'gasto', 'latitude', 'longitude', 'foto', 'bultos_abono',
        'semilla', 'etapa', 'rendimiento', 'ph', 'tratamiento'
    ];
    
    //Relacion uno a muchos for: Fumigo y abono
    public function fumigo(){

    }
    //Relacion uno a muchos con Trabajo
    public function trabajo(){
        return $this->hasMany(Trabajo::class,'cultivo_id');

    }
    //Relacion uno a muchos Viajes-Cosecha
    public function viajes(){
        return $this->hasMany(Viaje::class,'cultivo_id');

    }
    //Relacion uno a muchos Gastos
    public function gastos(){
        return $this->hasMany(Gasto::class,'cultivo_id');
    }
    
}
