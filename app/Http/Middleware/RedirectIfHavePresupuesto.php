<?php

namespace App\Http\Middleware;

use Closure;

class RedirectIfHavePresupuesto
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $consorcio = $request->route()->parameter('consorcio');

        if ($consorcio->presupuestos->count() > 0) {
            return redirect(url('consorcios/' . $consorcio->id . '/presupuestos'))->with('warnings', __('Ya tiene un presupuesto activo'));
        };
        redirect()->route('consorcios.presupuesto.selectfirst', $consorcio)->with('warnings', __('Seleccione el perído para el primer presupuesto'));
        return $next($request);
    }
}
