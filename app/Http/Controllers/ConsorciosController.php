<?php

namespace App\Http\Controllers;

use App\Consorcio;
use Illuminate\Http\Request;

class ConsorciosController extends Controller
{
    /**
     * ConsorciosController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @param Consorcio $consorcio
     * @return mixed
     */
    public function redirectToDefaultSection(Consorcio $consorcio)
    {
        // TODO: Redireccionar segun el perfil del usuario, administracion, cobranzas, liquidación...
        return redirect()->route('consorcios.presupuestos', $consorcio->id);
    }

    /**
     * @return mixed
     */
    public function consorcios()
    {
        $consorcios = Consorcio::all();

        return view('consorcios.consorcios', compact('consorcios'));
    }
}
