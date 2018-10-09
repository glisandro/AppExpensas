<?php

namespace App\Http\Controllers\Consorcios;

use App\Consorcio;
use App\Cupon;
use App\Propiedad;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

        $this->middleware('hasPropiedad');
        
        $this->middleware('hasPresupuesto');
    }

    public function propiedades(Consorcio $consorcio)
    {
        $propiedades = Propiedad::all();

        return view('consorcios.cuentacorriente.propiedades', compact('consorcio','propiedades'));
    }

    public function show(Consorcio $consorcio, Propiedad $propiedad)
    {
        $cupones = Cupon::propiedad($propiedad)->get();

        return view('consorcios.cuentacorriente.show', compact('propiedad','cupones'));
    }
}
