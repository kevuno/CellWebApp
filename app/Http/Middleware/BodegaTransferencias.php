<?php

namespace App\Http\Middleware;

use Closure;

//Para poder usar el objecto del usuario que esta logueado
use Auth;
//Para poder usar el objeto bodega
use App\Bodega;
//Para poder usar el objeto de las transferencias
use App\Transferencia;

//Para poder mostrar cierta inforamcion dependiendo del rol
use App\Role;


class BodegaTransferencias
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        
        $transferencia = Transferencia::find($request -> transferencia);
        //If the user is an admin or owner, then accept the request regardless. Otherwise, check that the 
        // bodegas of the transferencia matches the bodega of the user
        if(!Auth::user()->hasRole(["owner","admin"])){
            if (Auth::user()->bodega->id != $transferencia->bodega_destino && Auth::user()->bodega->id != $transferencia->bodega_origen) {
                if ($request->ajax() || $request->wantsJson()) {
                    return response('Unauthorized.', 401);
                }

                return redirect()->guest('login');
            }
        }    
        return $next($request);
        


    }
}
