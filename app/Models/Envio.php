<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Envio extends Model
{
    use HasFactory;
    protected $table = 'envio';
    protected $fillabe = [

    ];
    public function cultivo(){
        return $this->belongsTo(Cultivo::class,'cultivo_id');
    }
}
