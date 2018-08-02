<?php

namespace App\Http\Controllers\Consorcios;

use App\Consorcio;
use App\Http\Controllers\Controller;
use App\Presupuesto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class PresupuestosController extends Controller
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
    public function index(Consorcio $consorcio)
    {
        return redirect()->action(
            'Consorcios\\PresupuestosController@actual', ['consorcio' => $consorcio]
        );
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function actual(Consorcio $consorcio)
    {
        $presupuesto = Presupuesto::where('consorcio_id', $consorcio->id)->latest()->first();

        return view('consorcios.presupuestos.actual', compact('consorcio','presupuesto'));
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function history(Consorcio $consorcio)
    {
        $presupuestos = Presupuesto::simplePaginate(12);
        $presupuestos->appends(['tab' => 'history']);

        return view('consorcios.presupuestos.history', compact('consorcio','presupuestos'));
    }
    
}
