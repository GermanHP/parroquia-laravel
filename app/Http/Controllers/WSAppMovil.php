<?php

namespace App\Http\Controllers;

use App\Models\Actividade;
use App\Models\Evangelio;
use App\Models\Noticia;
use Illuminate\Http\Request;

class WSAppMovil extends Controller
{
    public function MostrarNoticias(){
        $noticias = Noticia::with('user')->get();
        if($noticias->count()>0){
            return response()->json(['ErrorCode' => '0',  'noticias' => $noticias]);
        }else{
            return response()->json(['ErrorCode' => '1',  'noticias' => "Sin datos encontrados"]);
        }

    }

    public function MostrarEvagnelio(){
        $evangelio = Evangelio::orderBy('id','DESC')->with('user')->first();
        if($evangelio!=NULL){
            return response()->json(['ErrorCode' => '0',  'evangelio' => $evangelio]);
        }else{
            return response()->json(['ErrorCode' => '1',  'evangelio' => "Sin datos encontrados"]);
        }

    }

    public  function MostrarActividades(){
        $actividades = Actividade::where('idTipoActividad',1)->orWhere('idTipoActividad',4)->whereNull('deleted_at')->with('tipoactividad','gruposactividades.grupo')->get();
        if($actividades->count()>0){
            return response()->json(['ErrorCode' => '0',  'actividades' => $actividades]);
        }else{
            return response()->json(['ErrorCode' => '1',  'actividades' => "Sin datos encontrados"]);
        }

    }


}
