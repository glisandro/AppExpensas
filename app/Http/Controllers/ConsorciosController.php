<?php

namespace App\Http\Controllers;

use App\Consorcio;
use Illuminate\Http\Request;

class ConsorciosController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function redirect(Consorcio $consorcio)
    {
        // TODO: Redireccionar segun el perfil del usuario, administracion, cobranzas, liquidación...
        return redirect()->route('consorcios.presupuestos', $consorcio->id);
    }

    public function consorcios()
    {
        $consorcios = Consorcio::all();

        return view('consorcios.consorcios', compact('consorcios'));
    }
}
