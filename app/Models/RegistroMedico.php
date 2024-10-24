<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistroMedico extends Model
{
    use HasFactory;
    /*
    Relacion de RegistroMedico con Animal
    */
    public function animal(){
        return $this->belongsTo(Animal::class);
    }
        
}
