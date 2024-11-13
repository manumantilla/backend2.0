<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trabajo extends Model
{
    use HasFactory;
    protected $table = 'trabajo';
    protected $fillable =[
        'cultivo_id',
        'tipo',
        'fecha_inicio',
        'fecha_fin',
        'descripcion',
        'ubicacion',
        'estado',
        'prioridad',
    ];

   
    //* Relation: Trabajo belongs to Cultivo table
    public function trabajo(){
        return $this->belongsTo(Cultivo::class,'cultivo_id');
    }
    // Trabajo.php
    public function empleados()
    {
        return $this->belongsToMany(Empleado::class, 'empleado_trabajo')->withPivot('descripcion', 'pago');
    }

}
