<?php

namespace App\Http\Middleware;

use Closure;

class RedirectIfNotHavePropiedad
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
        $consorcio = $request->route('consorcio');

        if($consorcio->propiedades->count() == 0){
            return redirect(url('settings/consorcios/' . $consorcio->id . '#/uf'))->with('warnings', 'Necesita cargar Unidades Funcionales antes de continuar.');
        };

        return $next($request);
    }
}
