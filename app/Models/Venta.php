<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;
    PROTECTED $table = 'venta';
    // Especificar los atributos que se pueden asignar de forma masiva
    protected $fillable = [
        'animalId',           // Referencia al animal vendido
        'peso_venta',          // Peso del animal en el momento de la venta
        'valor_kilo',          // Precio por kilo del animal
        'nombre_comprador',    // Nombre del comprador
        'contacto_comprador',  // Contacto del comprador
        'guia',                // Archivo guía
    ];

    // Definir la relación con el modelo Animal (un animal pertenece a una venta)
    public function animal()
    {
        return $this->belongsTo(Animal::class, 'animal_id');
    }
}
