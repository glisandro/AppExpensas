<?php

namespace App\Http\Middleware;

use Closure;

class RedirectIfNotHavePropiedad
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
        $consorcio = $request->route('consorcio');

        $redirect = false;

        if ($consorcio->propiedades->count() == 0) {
            $msgError = 'Necesita cargar Unidades Funcionales antes de continuar.';
            $redirect = true;
        }

        $coeficiente_a = trim($consorcio->propiedades->sum('coeficiente_a'));
        $coeficiente_b = trim($consorcio->propiedades->sum('coeficiente_b'));
        $coeficiente_c = trim($consorcio->propiedades->sum('coeficiente_c'));
        $coeficiente_d = trim($consorcio->propiedades->sum('coeficiente_d'));
        $coeficiente_e = trim($consorcio->propiedades->sum('coeficiente_e'));
        $coeficiente_f = trim($consorcio->propiedades->sum('coeficiente_f'));

        if ($coeficiente_a <> '0' AND $coeficiente_a <> '1') {
            $msgError = 'La suma de los coeficientes A deben ser 1 o 0.';
            $redirect = true;
        }

        if ($coeficiente_b <> '0' AND $coeficiente_b <> '1') {
            $msgError = 'La suma de los coeficientes B deben ser 1 o 0.';
            $redirect = true;
        }

        if ($coeficiente_c <> '0' AND $coeficiente_c <> '1') {
            $msgError = 'La suma de los coeficientes C deben ser 1 o 0.';
            $redirect = true;
        }

        if ($coeficiente_d <> '0' AND $coeficiente_d <> '1') {
            $msgError = 'La suma de los coeficientes ext. A deben ser 1 o 0.';
            $redirect = true;
        }

        if ($coeficiente_e <> '0' AND $coeficiente_e <> '1') {
            $msgError = 'La suma de los coeficientes ext. B deben ser 1 o 0.';
            $redirect = true;
        }

        if ($coeficiente_f <> '0' AND $coeficiente_f <> '1') {
            $msgError = 'La suma de los coeficientes ext. C deben ser 1 o 0.';
            $redirect = true;
        }

        if($redirect){
            return redirect(url('settings/consorcios/' . $consorcio->id . '#/uf'))->with('warnings', $msgError);
        }

        return $next($request);
    }
}
