<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Utilities\Rol_Identificador;
use Auth;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected function redirectTo(){
        $rolIdentificador = new Rol_Identificador();
        if($rolIdentificador->isAdmin(Auth::user())){
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
        $this->middleware('guest');
    }
}
