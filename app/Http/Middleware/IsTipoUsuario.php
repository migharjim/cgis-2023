<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsTipoUsuario
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    /*Pasamos un splat operator ...$tipo_usuario_ids (https://www.php.net/manual/en/migration56.new-features.php#migration56.new-features.variadics)
      que será convertido automáticamente a array
    */
    public function handle(Request $request, Closure $next, ...$tipo_usuario_ids)
    {
        //Pasamos el array a Laravel Collection (https://laravel.com/docs/8.x/collections) para trabajar con contains
        if(collect($tipo_usuario_ids)->contains(Auth::user()->tipo_usuario_id)){
            return $next($request);
        }
        else{
            return redirect(RouteServiceProvider::HOME);
        }
    }
}
