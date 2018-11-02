<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Noticia;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function main(){
        $avisos = Noticia::where('deleted_at',NULL)->orderBy('id', 'DESC')->get();
        return view('inicio',compact('avisos'));
    }

    public function paneladmin(){
        return view('panels.adminpanel');
    }

    public function calendario(){
        return view('actividades.programaactividades');
    }

    public function pastoralProfetica(){
        return view('Realidades.organigramaPastoral.profetica');
    }

    public function pastoralLiturgica(){
        return view('Realidades.organigramaPastoral.liturgica');
    }

    public function pastoralEspecial(){
        return view('Realidades.organigramaPastoral.especializada');
    }

    public function pastoralMovimientos(){
        return view('Realidades.organigramaPastoral.movimientos');
    }

    public function pastoralAsociaciones(){
        return view('Realidades.organigramaPastoral.asociaciones');
    }

    public function misales(){
        return view('evangelio.misales');
    }

    public function galeria(){
        return view('galeria.galeria');
    }

    public function oficina(){
        return view('galeria.oficina');
    }

    public function jornada(){
        return view('galeria.jmj2019');
    }
}
