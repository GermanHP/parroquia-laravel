<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CelebracionesController extends Controller
{
    public function solicitarCelebracion(){
        return view('solicitudes.celebraciones');
    }

    public function slicitarIntencion(){
        return view('solicitudes.intenciones');
    }
}
