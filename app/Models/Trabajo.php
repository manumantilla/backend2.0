<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trabajo extends Model
{
    use HasFactory;

    //relacion uno a muchos: un trabajo tiene muchos empleados_trabajo
    public function empleado_trabajo(){
        return $this->hasMany(Empleado_Trabajo::class,'trabajo_id');
    }
    //* Relation: Trabajo belongs to Cultivo table
    public function trabajo(){
        return $this->belongsTo(Cultivo::class,'cultivo_id');
    }
}
