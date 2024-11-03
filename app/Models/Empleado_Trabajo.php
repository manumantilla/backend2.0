<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado_Trabajo extends Model
{
    use HasFactory;
    protected $table = 'empleado_trabajo';

    //*Relation: Empleado_Trabajo has many Empleados
    public function empleado(){
        return $this->belongsTo(Empleado::class,'empleado_id');
    }
    public function trabajo(){
        return $this->belongsTo(Trabajo::class,'trabajo_id');
    }
}
