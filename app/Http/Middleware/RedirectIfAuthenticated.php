<?php

namespace App\Http\Middleware;

use App\Utilities\Rol_Identificador;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            $rolIdentificador = new Rol_Identificador();
            if($rolIdentificador->isAdmin(Auth::user())){
                return redirect('/administracion');
            }else if($rolIdentificador->isGestor(Auth::user())){
                return redirect('/administracion');
            }else{
                return redirect('/MisGrupos');
            }
        }


        return $next($request);
    }
}
