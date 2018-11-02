<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActualizarGrupoRequest;
use App\Http\Requests\RequestGrupo;
use App\Models\Actividade;
use App\Models\Gruposusuario;
use App\Models\Tipoactividad;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use App\Models\Grupo;

class GruposController extends Controller
{
    public function realidades(){
        return view('Realidades.realidades');
    }

    public function nuevoAviso(){
        return view('Admin.Acciones.Aviso');
    }

    public function nuevaActividad(){
        $actividad = Tipoactividad::where('id',1)->orwhere('id',4)->pluck('nombre','id');

        return view('Admin.Acciones.Actividad', compact('actividad'));
    }

    public function novedad(){
        $novedad = Tipoactividad::where('id',1)->orwhere('id',4)->pluck('nombre','id');

        return view('Admin.Acciones.novedad', compact('novedad'));
    }

    public function Evangelio(){
        return view('Admin.Acciones.EvangelioDelDia');
    }

    public function CrearNuevoGrupo(){
        return view('Admin.Acciones.NuevoGrupo');
    }

    public function showgrupos(){
        $grupos = Grupo::all();

        return view('Admin.Grupos.MostrarGrupos', compact('grupos'));
    }

    public function detalleGrupos($id){
        $grupos = Grupo::find($id);
        return view('Admin.Grupos.detalleGrupo',compact('grupos'));
    }

    public function ActualizarGrupo($id){
        $grupo = Grupo::find($id);


        return view('Admin.Grupos.ActualizarGrupo', compact('grupo'));
    }

    public function UpdateGrupo(ActualizarGrupoRequest  $request, $id){
        $grupoActualizar = Grupo::find($id);

        $grupoActualizar->fill([
            'nombre'=>$request['nombre'],
            'descripcion'=>$request['descripcion'],

        ]);
        $grupoActualizar->save();

        flash('Grupo Actualizado exitosamente','info');
        return redirect()->back();
    }

    public function EliminarGrupo($id){
        $eliminarGrupo = Grupo::find($id);

        foreach($eliminarGrupo->gruposactividades as $actividad){
            $actividad->delete();
        }

        foreach ($eliminarGrupo->gruposusuarios as $usuarios){
            $usuarios->delete();
        }

        $eliminarGrupo->delete();

        flash('Grupo eliminado exitosamente','info');
        return redirect('/grupos');
    }

    public function MisGrupos(){
        $grupos = Gruposusuario::where('idUsuario', Auth::user()->id)->where('deleted_at',NULL)->get();
        return view('UsersNormales.Grupos.MisGrupos', compact('grupos'));
    }
    public function MisMiembros($id){
        $grupo = Grupo::find($id);
        return view('Admin.Usuarios.Miembos', compact('grupo'));
    }
    public function CrearSubGrupo($id){
        $grupo = Grupo::find($id);
        return view('UsersNormales.Grupos.CrearSubGrupo',compact('grupo'));

    }
    public function GuardarSubGrupo(RequestGrupo $request,$id){
        $nuevogrupo = new Grupo();

        $nuevogrupo->fill([
            'nombre'=> $request['nombreGrupo'],
            'descripcion'=> $request['descripcionGrupo'],
            'idGrupo'=>$id
        ]);

        $nuevogrupo->save();
        $grupoUsuario = new Gruposusuario();
        $grupoUsuario->fill([
            'idUsuario'=>Auth::user()->id,
            'idGrupo'=>$nuevogrupo->id,
            'idRolGrupo'=>1
        ]);
        $grupoUsuario->save();

        flash('Grupo creado exitosamente', 'success');
        return redirect()->back();
    }
}
