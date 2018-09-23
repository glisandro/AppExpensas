<?php

namespace App\Http\Controllers\Consorcios;

use App\Consorcio;
use App\Gasto;
use App\Http\Controllers\Controller;
use App\Presupuesto;
use Symfony\Component\HttpFoundation\Request;

class GastosController extends Controller
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
    public function store(Request $request, Consorcio $consorcio, Presupuesto $presupuesto)
    {
        $data = $request->all();

        $gasto = new Gasto([
            'concepto' => $data['concepto'],
            'rubro' => 1,
            'importe_a' => $data['importe_a'],
            'importe_b' => $data['importe_b'],
            'importe_c' => $data['importe_c'],
        ]);

        // TODO: TOTALIZAR PRESUPUETOS
        // TODO: RESOLVER EXTRAORDINARIAS
        $presupuesto->gastos()->save($gasto);

        return back();
    }


}
