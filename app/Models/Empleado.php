<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $table = 'empleado';
    use HasFactory;
    // Empleado.php
    public function trabajos()
    {
        return $this->belongsToMany(Trabajo::class, 'empleado_trabajo')->withPivot('descripcion', 'pago');
    }

}
