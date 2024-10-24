<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gasto extends Model
{
    use HasFactory;
    protected $table = 'gasto';
    protected $fillable = [
        'cultivo_id',
        'foto',
        'responsable',
        'descripcion',
        'valor',
        'vendedor',
        'tipo',
        'ciclo',
    ];
    //gasto pertene a la tabla Cultivo
    public function gasto(){
        return $this->belongsTo(Cultivo::class,'cultivo_id');
    }
}
