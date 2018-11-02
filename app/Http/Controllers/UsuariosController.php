<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestNuevoUsuario;
use App\Http\Requests\ResetContraseña;
use App\Models\Grupo;
use App\Models\Rolessistema;
use App\Models\Rolessistemausuario;
use App\Models\User;
use App\Utilities\Action;
use App\Utilities\Rol_Identificador;
use Auth;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grupos = Grupo::pluck('nombre', 'id');
        $usuarios = User::withTrashed()->where('id','!=', Auth::user()->id)->get();
        return view('Admin.Usuarios.MostrarUsuarios', compact('usuarios','grupos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('Admin.Usuarios.NuevoUsuario');
    }
    public function crear(){
        $grupos = Grupo::pluck('nombre', 'id');
        $roles = Rolessistema::all();
        return view('Admin.Usuarios.NuevoUsuario', compact('roles','grupos'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestNuevoUsuario $request)
    {
        if($request['email']==null){
            $generador = new Action();
            $request['email']=$generador->generarEmail($request['nombre'], $request['apellido']);
        }
        $user = new User();
        $user->fill([
            "nombre"=>$request["nombre"],
            "apellido"=>$request["apellido"],
            "fechaDeNacimiento"=>$request["fechaDeNacimiento"],
            "genero"=>$request["genero"],
            "DUI"=>$request["DUI"],
            "email"=>$request["email"],
            "resetPassword"=>1,
            "password"=>bcrypt("parroquia2017")
        ]);
        $user->save();
        foreach ($request['rolUsuario']as $rol){
            $rolUsuario = new Rolessistemausuario();
            $rolUsuario->fill([
                "idRolSistema"=>$rol,
                "idUsuario"=>$user->id,
            ]);
            $rolUsuario->save();
        }
        flash('Registro Exitoso', 'success');
        return redirect()->back();
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
    public function editar($id){
        $grupos = Grupo::pluck('nombre', 'id');
        $user = User::find($id);
        $roles = Rolessistema::all();
        return view('Admin.Usuarios.EditarUsuario', compact('roles','grupos','user'));
    }
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestNuevoUsuario $request, $id)
    {
        if($request['email']==null){
            $generador = new Action();
            $request['email']=$generador->generarEmail($request['nombre'], $request['apellido']);
        }
        $user = User::find($id);
        $user->fill([
            "nombre"=>$request["nombre"],
            "apellido"=>$request["apellido"],
            "fechaDeNacimiento"=>$request["fechaDeNacimiento"],
            "genero"=>$request["genero"],
            "DUI"=>$request["DUI"],
            "email"=>$request["email"],
            "resetPassword"=>1,
            "password"=>bcrypt("todociber")
        ]);
        $user->save();

        foreach ($user->rolessistemausuarios as $rolesAsignados){
            $rolesAsignados->delete();
        }
        foreach ($request['rolUsuario']as $rol){
            $rolUsuario = new Rolessistemausuario();
            $rolUsuario->fill([
                "idRolSistema"=>$rol,
                "idUsuario"=>$user->id,
            ]);
            $rolUsuario->save();
        }
        flash('Registro Exitoso', 'success');
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


        $user = User::withTrashed()->where('id',$id)->first();
        if($user->deleted_at==null){
            foreach ($user->gruposusuarios as $grupos){
                $grupos->delete();
            }
            $user->delete();
            flash('Usuario Desactivado', 'danger');
        }else{
            $user->restore();
            flash('Usuario Activado', 'warning');
        }


        return redirect()->back();
    }

    public function cambiarPassword(){
        return view('auth.CambiarPassowrd');
    }
    public function guardarCambioContrasñea(ResetContraseña $request){

        if($request['password']==$request['password_confirmation']&&$request['password']!='parroquia2017'){
            $user =  User::find(Auth::user()->id);
            $user->fill([
                "password"=>bcrypt($request['password']),
                "resetPassword"=>'0'
            ]);
            $user->save();
            $rolIdentificador = new Rol_Identificador();
            if($rolIdentificador->isAdmin(Auth::user())){
                return redirect('/administracion');
            }else if($rolIdentificador->isGestor(Auth::user())){
                return redirect('/administracion');
            }else{
                return redirect('/MisGrupos');
            }
        }else{
            flash('Error contraseñas no coiciden','danger');
            return redirect()->back()->withInput();
        }

    }
}
