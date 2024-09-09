<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PerfilController extends Controller
{
    //Para mostrar el perfil
    public function index(){
        return view('index');
    }
    //Para mostrar la vista de intereses
    public function intereses(){
        return view('intereses');
    }
    //for show habilities view
    public function habilidades(){
        return view('habilidades');
    }
    //for show metas view    
    public function metas(){
        return view('metas');
    }
}
