<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Envio extends Model
{
    use HasFactory;
    protected $table = 'envio';
 
        protected $fillable = [
            'cultivo_id',
            'peso',
            'bultos_calidad_alta',
            'bultos_calidad_media',
            'bultos_calidad_baja',
            'costos_generales',
            'placa_vehiculo',
            'nombre_conductor',
            'valor_flete',
            'fecha_envio',
            'valor_bultos_calidad_alta',
            'valor_bultos_calidad_media',
            'valor_bultos_calidad_baja',
            'comprador',
            'estado'
        ];

    public function cultivo(){
        return $this->belongsTo(Cultivo::class,'cultivo_id');
    }
}
