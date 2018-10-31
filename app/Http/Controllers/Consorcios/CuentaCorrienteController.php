<?php

namespace App\Http\Controllers\Consorcios;

use App\Consorcio;
use App\Cupon;
use App\Http\Controllers\Controller;
use App\Propiedad;

class CuentaCorrienteController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware('RedirectIfHasNotPropiedad');

        $this->middleware('RedirectIfHasNotPresupuesto');
    }

    public function propiedades(Consorcio $consorcio)
    {
        $propiedades = Propiedad::all();

        return view('consorcios.cuentacorriente.propiedades', compact('consorcio', 'propiedades'));
    }

    public function show(Consorcio $consorcio, Propiedad $propiedad)
    {
        $cupones = Cupon::propiedad($propiedad)->get();

        return view('consorcios.cuentacorriente.show', compact('propiedad', 'cupones'));
    }
}
