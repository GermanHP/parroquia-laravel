<?php

namespace App\Http\Controllers;

use App\Http\Requests\NovedadRequest;
use App\Http\Requests\NuevaActividadRequest;
use App\Models\Actividade;
use App\Models\Actividadesusuario;
use App\Models\Grupo;
use App\Models\Gruposactividade;
use App\Models\Tipoactividad;
use App\Utilities\VinculacionActividad;
use Illuminate\Http\Request;

class ActividadesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grupos = Grupo::pluck('nombre', 'id');
        $actividades = Actividade::all();
        return view('Admin.Actividades.MostrarTodasActividades',compact('grupos', 'actividades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function Detalles($id){
        $actividad = Actividade::find($id);
        $grupos = Grupo::pluck('nombre', 'id');
        return  view('Admin.Actividades.DetalleActividad',compact('grupos','actividad'));
    }
    public function Nueva($id){
        $idGrupo = $id;
        $tipoActividad = Tipoactividad::pluck('nombre','id');
        return view('UsersNormales.Actividades.NuevasActividades', compact('tipoActividad','idGrupo'));
    }
    public function Insertar($id,NuevaActividadRequest $request){
        $actividad = new Actividade();
        $actividad->fill([
            "nombre"=>$request["nombreActividad"],
            "descripcion"=>$request["descripcionActividad"],
            "fechaDeVigencia"=>$request["FechaActividad"],
            "HoraInicio"=>$request["horaInicio"],
            "HoraFin"=>$request["horaFin"],
            "otrosDatosDeInteres"=>"",
            "idTipoActividad"=>$request["tipoActividad"]
        ]);
        $actividad->save();
        if($id=!0){
            $actividadGrupo = new Gruposactividade();
            $actividadGrupo->fill([
                "idGrupo"=>$id,
                "idActividad"=>$actividad->id
            ]);
            $actividadGrupo->save();
        }

        flash('Actividad Creada Exitosamente','success');
        return redirect()->back();
    }

    public function InsertarNovedad($id,NovedadRequest $request){
        $novedad = new Actividade();
        $novedad->fill([
           "nombre"=>$request["tituloNovedad"],
            "descripcion"=>$request["descripcionNovedad"],
            "fechaDeVigencia"=>"10/11/2017",
            "HoraInicio"=>"7:00",
            "HoraFin"=>"8:00",
            "otrosDatosDeInteres"=>"",
            "idTipoActividad"=>"5"
        ]);

        $novedad->save();

        flash('Novedad Creada Exitosamente','success');
        return redirect()->back();
    }

    public function showNovedad(){
        $novedad = Actividade::where('idTipoActividad',5)->get();

        return view('Admin.Noticias.MostrarNovedades',compact('novedad'));
    }

    public function detalleNovedad($id){
        $novedad = Actividade::find($id);

        return view('Admin.Noticias.DetalleNovedad', compact('novedad'));
    }

    public function VincularActividadesGrupos($id){


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $actividad = Actividade::find($id);
        $tipoActividad = Tipoactividad::pluck('nombre','id');
        return view("UsersNormales.Actividades.EditarActividad", compact("actividad","tipoActividad"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NuevaActividadRequest $request, $id)
    {
        $actividad= Actividade::find($id);
        $actividad->fill([
            "nombre"=>$request["nombreActividad"],
            "descripcion"=>$request["descripcionActividad"],
            "fechaDeVigencia"=>$request["FechaActividad"],
            "HoraInicio"=>$request["horaInicio"],
            "HoraFin"=>$request["horaFin"],
            "otrosDatosDeInteres"=>"",
            "idTipoActividad"=>$request["tipoActividad"]
        ]);
        $actividad->save();

        flash('Actividad Editada Exitosamente','success');
        return redirect()->back();
    }
    public function Desvincular(Request $request, $id){
        $actividad = Actividade::find($id);
        $grupo = $request['idGrupo'];
        if($actividad->idTipoActividad ==1){
            $this->DesvincularActPublica($actividad, $grupo);
        }else if ($actividad->idTipoActividad==2){
                $this->DesvincularActPrivada($actividad, $grupo);
        }else if($actividad->idTipoActividad==3){
            $this->DesvincularActEspecifica($actividad, $grupo);
        }else {
            $this->DesvincularActGeneral($actividad, $grupo);
        }

        flash('Actividad desvinculada exitosamente', 'danger');
        return redirect()->back();
    }

    private function DesvincularActPublica($actividad, $idGrupo){
        foreach ($actividad->gruposactividades as $grupos){
            if($grupos->idGrupo ==$idGrupo){
                $grupos->delete();
            }
        }

    }

    private function DesvincularActPrivada($actividad, $idGrupo){
        foreach ($actividad->gruposactividades as $grupos){
            if($grupos->idGrupo ==$idGrupo){
                $grupos->delete();
            }
        }
        $actividad->delete();
    }

    private function DesvincularActEspecifica($actividad, $idGrupo){
        foreach ($actividad->gruposactividades as $grupos){
            if($grupos->idGrupo ==$idGrupo){
                $grupos->delete();
            }
        }
        $actividad->delete();
    }

    private function DesvincularActGeneral($actividad, $idGrupo){
        foreach ($actividad->gruposactividades as $grupos){
            if($grupos->idGrupo ==$idGrupo){
                $grupos->delete();
            }
        }
    }

    public function Buscar($id)
    {
        $grupoid= Grupo::find($id);
        $ActividadesGrupo = Actividade::where('idTipoActividad',1)->orWhere('idTipoActividad',4)->get();
        return view('UsersNormales.Actividades.BuscarActividades', compact('grupoid','ActividadesGrupo'));

    }
    public function VincularActGrupo($idGrupo,$idActividad){
        $vinculacion = new VinculacionActividad();
        if(!$vinculacion->Vinculacion($idActividad,$idGrupo)){
            $actividad = Actividade::find($idActividad);
            if($actividad->idTipoActividad ==2 ||$actividad->idTipoActividad ==3 ){
                return redirect("/404");
            }
            $grupoActividad = new Gruposactividade();
            $grupoActividad->fill([
                "idGrupo"=>$idGrupo,
                "idActividad"=>$idActividad,
            ]);
            $grupoActividad->save();
            flash('Actividad Vinculada exitosamente', 'info');
            return redirect()->back();
        }else{
            return redirect("/404");
        }
    }
    public function Asignar($idGrupo,$idActividad){
        $grupo = Grupo::find($idGrupo);
        $actividad = Actividade::find($idActividad);
        return view('UsersNormales.Actividades.AsignarActividad', compact('grupo','actividad'));
    }

    public function AsignarInserte($idGrupo,$idActividad, Request $request){
        $actividadesUsuarios = new Actividadesusuario();
        $actividadesUsuarios->fill([
            "idUsuario"=>$request["idUsuario"],
            "idGrupoUsuario"=>$idGrupo,
            "idActividad"=>$idActividad
        ]);
        $actividadesUsuarios->save();
        flash('Actividad Asignada','info');
        return redirect()->back();

    }

    public function QuitarAsignacion($idUsuario,$idActividad){
        $actividadusuario = Actividadesusuario::where("idUsuario",$idUsuario)->where('idActividad',$idActividad)->get();
        if($actividadusuario->count()>0){
            $actividadusuario[0]->delete();
        }
        flash('Asignacion eliminada', 'warning');
        return redirect()->back();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $actividad = Actividade::find($id);
        foreach ($actividad->actividadesusuarios as $actividadesusuario){
            $actividadesusuario->delete();
        }
        foreach ($actividad->gruposactividades as $gruposactividade){
            $gruposactividade->delete();
        }
        $actividad->delete();

        flash('Actividad Eliminada con Exito', 'warning');
        return redirect()->back();
    }
}
