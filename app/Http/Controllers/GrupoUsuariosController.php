<?php

namespace App\Http\Controllers;

use App\Models\Grupo;
use App\Models\Gruposusuario;
use App\Models\Rolesgrupo;
use App\Models\User;
use ClassesWithParents\G;
use Illuminate\Http\Request;

class GrupoUsuariosController extends Controller
{
    public function GrupoUsuario($id){
        $grupos = Grupo::pluck('nombre', 'id');
        $grupo = Grupo::find($id);
        $rolesGrupos = Rolesgrupo::all();
        $roles = Rolesgrupo::pluck('nombre','id');
        $usuarios = User::all();
        return view('Admin.Grupos.VincularUsuario', compact('grupos','grupo', 'rolesGrupos','usuarios', 'roles'));

    }

    public function VincularUsuarioGrupo(Request $request, $id,$idUsuario){

        $grupoExistente = Gruposusuario::where('idUsuario',$idUsuario)->where('idGrupo',$id)->where('deleted_at',NULL)->get();
        foreach ($grupoExistente as $existente){
            $existente->delete();
        }
        $grupoUsuario = new Gruposusuario();
        $grupoUsuario->fill([
            "idUsuario"=>$idUsuario,
            "idGrupo"=>$id,
            "idRolGrupo"=>$request['roles']
        ]);
        $grupoUsuario->save();
        flash('Usuario Vinculado Exitosamente','success');
        return redirect()->back();
    }
    public function Desvincular($id,$idUsuario){
        $grupoExistente = Gruposusuario::where('idUsuario',$idUsuario)->where('idGrupo',$id)->where('deleted_at',NULL)->get();
        foreach ($grupoExistente as $existente){
            $existente->delete();
        }
        flash('Usuario Vinculado Exitosamente','danger');
        return redirect()->back();
    }
}
