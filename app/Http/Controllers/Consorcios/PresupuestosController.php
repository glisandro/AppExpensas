<?php

namespace App\Http\Controllers\Consorcios;

use App\Consorcio;
use App\Http\Controllers\Controller;
use App\Presupuesto;
use Carbon\Carbon;
use Illuminate\Routing\RouteCollection;
use Symfony\Component\HttpFoundation\Request;

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
        $presupuesto = Presupuesto::where((['estado' => Presupuesto::$estado_abierto]))->latest()->first();

        if(! $presupuesto) {
            $presupuesto = Presupuesto::Create([
                'periodo' => ucwords(Carbon::now()->addMonth()->formatLocalized('%B %Y')),
                'desde' => Carbon::now()->startOfMonth()->toDateString(),
                'hasta' => Carbon::now()->endOfMonth()->toDateString(),
                'consorcio_id' => $consorcio->id,
                'total_expensa_a' => 0,
                'total_expensa_b' => 0,
                'total_expensa_c' => 0,
                'total_expensa_ext_a' => 0,
                'total_expensa_ext_b' => 0,
                'total_expensa_ext_c' => 0,
                'estado' => 'abierto'
            ]);
        }

        return redirect()->action(
            'Consorcios\\PresupuestosController@actual', ['consorcio' => $consorcio, 'presupuesto' => $presupuesto]
        );
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function actual(Consorcio $consorcio, Presupuesto $presupuesto)
    {
        $history = (Presupuesto::all()->count() > 1) ?? true;

        $presupuesto = Presupuesto::where(['estado' => Presupuesto::$estado_abierto])->findOrFail($presupuesto->id);

        return view('consorcios.presupuestos.actual', compact('consorcio', 'presupuesto', 'history'));
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function history(Consorcio $consorcio)
    {
        $history = (Presupuesto::all()->count() > 1) ?? true;

        if(! $history) {
            // TODO: Fash message
            return redirect()->route('consorcios.presupuestos.actual', [$consorcio, $presupuesto]);
        }
        
        $presupuestos = Presupuesto::where(['estado'=>'cerrado'])->simplePaginate(12);


        return view('consorcios.presupuestos.history', compact('consorcio','presupuestos'));
    }

    public function liquidar(Request $request, Consorcio $consorcio, Presupuesto $presupuesto)
    {
        $data = $request->all();

        $presupuesto = Presupuesto::where(['estado' => Presupuesto::$estado_abierto])->findOrFail($presupuesto->id);
        $presupuesto->estado = 'cerrado';
        $presupuesto->save();

        // TODO: Fash message
        return redirect()->route('consorcios.presupuestos', [$consorcio]);
    }
}
