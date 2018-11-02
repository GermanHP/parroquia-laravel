<?php
/**
 * Created by PhpStorm.
 * User: Todociber
 * Date: 27/03/2017
 * Time: 11:50 PM
 */

namespace App\Utilities;


use App\Models\Actividadesusuario;
use App\Models\Gruposactividade;

class VinculacionActividad
{

    public function Vinculacion($idActividad, $idGrupo){
        $grupoActividad = Gruposactividade::where('idGrupo',$idGrupo)->where('idActividad',$idActividad)->count();
        if($grupoActividad==0){
            return false;
        }else{
            return true;
        }
    }

    public function ActividadAsignada($idUsuario,$idActividad){
        $actividadUsuario = Actividadesusuario::where("idUsuario",$idUsuario)->where("idActividad",$idActividad)->count();

        if($actividadUsuario==0){
            return false;
        }else{
            return true;
        }
    }
}