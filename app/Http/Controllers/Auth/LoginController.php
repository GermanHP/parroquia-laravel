<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Utilities\Rol_Identificador;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;


   //protected $redirectTo = '/home';

protected function redirectTo(){
        $rolIdentificador = new Rol_Identificador();
        if(Auth::user()->resetPassword==1){
            return '/CambiarContraseña';
        }else if($rolIdentificador->isAdmin(Auth::user())){
            return '/administracion';
        }else if($rolIdentificador->isGestor(Auth::user())){
            return '/administracion';
        }else{
            return '/MisGrupos';
        }

    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }
}
