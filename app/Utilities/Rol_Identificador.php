<?php
/**
 * Created by PhpStorm.
 * User: Todociber
 * Date: 20/03/2017
 * Time: 11:06 PM
 */

namespace App\Utilities;


use App\Models\Actividade;
use App\Models\Actividadesusuario;
use App\Models\Gruposusuario;

class Rol_Identificador
{

    public function RolSistema($user){
        $RolID = 0;
        if($this->isAdmin($user)){
            $RolID=1;
        }else if($this->isGestor($user)){
            $RolID=2;
        }else if($this->isMiembro($user)) {
            $RolID =3;
        }
        return $RolID;
    }

    public function isMiembro($user){
        $encontrado = false;
        foreach ($user->rolessistemausuarios as $roles){
            if($roles->idRolSistema==3){
                $encontrado= true;
            }
        }
        return $encontrado;
    }

    public function isAdmin($user){
        $encontrado = false;
        foreach ($user->rolessistemausuarios as $roles){
            if($roles->idRolSistema==1){
                $encontrado= true;
            }
        }
        return $encontrado;
    }


    public function isGestor($user){
        $encontrado = false;
        foreach ($user->rolessistemausuarios as $roles){
            if($roles->idRolSistema==2){
                $encontrado= true;
            }
        }
        return $encontrado;
    }

    public function RolesGrupo($idUser, $idGrupo){
        $Rol=0;
        $grupoUsuairio = Gruposusuario::where('idUsuario', $idUser)->where('idGrupo',$idGrupo)->get();
        if($grupoUsuairio->count()==0){
            $Rol=0;
        }else if ($grupoUsuairio->count()>1){
            $Rol=0;
        }else{
            $Rol=$grupoUsuairio[0]->idRolGrupo;
        }
        return $Rol;

    }

    public function VinculadoActividad($idUser, $idActividad){
        $actividad = Actividade::find($idActividad);
        $grupos = Gruposusuario::where('idUsuario', $idUser)->where('deleted_at',NULL)->get();
        $VinculadoGyA =false;
        foreach ($actividad->gruposactividades as $gruposactividade){
            foreach ($grupos as $grupo) {
                if($gruposactividade->idGrupo==$grupo->idGrupo){
                    $VinculadoGyA=true;
                }
            }
        }



        if($actividad->idTipoActividad==3){
            $actividadUsuario = Actividadesusuario::where('idUsuario', $idUser)->where('idActividad',$idActividad)->get();
            if($actividadUsuario->count()>0 &&$actividadUsuario->count()<2 ){
                $VinculadoGyA=true;
            }else{
                $VinculadoGyA=false;
            }
        }

        return $VinculadoGyA;
    }
}