<?php

namespace App\Http\Controllers\Consorcios;

use App\Consorcio;
use App\Expensas\Liquidacion\Conceptos\ConceptosLiquidablesAggregator;
use App\Expensas\Liquidacion\Conceptos\ExpenasOrinarias;
use App\Expensas\Liquidacion\Conceptos\ExpensasExtraordinarias;
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
    public function __construct(ConceptosLiquidablesAggregator $conceptosLiquidables)
    {
        $this->middleware('auth');
        
        $this->middleware('hasPropiedad');

        $this->middleware('hasPresupuesto', ['except' => array('first','storefirst')]);

        $this->conceptosLiquidables = $conceptosLiquidables;
    }

    /**
     * Show the application dashboard.
     *
     * @param Consorcio $consorcio
     * @return Response
     */
    public function index(Consorcio $consorcio)
    {
        $presupuesto = Presupuesto::abierto()->latest()->first();

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
     * @param Consorcio $consorcio
     * @return mixed
     */
    public function first(Consorcio $consorcio)
    {
        return view('consorcios.presupuestos.first', compact('consorcio'));
    }

    /**
     * Show the application dashboard.
     *
     * @param Consorcio $consorcio
     * @param Presupuesto $presupuesto
     * @return Response
     */
    public function actual(Consorcio $consorcio, Presupuesto $presupuesto)
    {
        $history = (Presupuesto::all()->count() > 1) ?? true;

        $presupuesto = Presupuesto::abierto()->findOrFail($presupuesto->id);

        return view('consorcios.presupuestos.actual', compact('consorcio', 'presupuesto', 'history'));
    }

    /**
     * Show the application dashboard.
     *
     * @param Consorcio $consorcio
     * @return Response
     */
    public function history(Consorcio $consorcio)
    {
        $history = (Presupuesto::all()->count() > 1) ?? true;

        if(! $history) {
            // TODO: Fash message
            return redirect()->route('consorcios.presupuestos.actual', [$consorcio, $presupuesto]);
        }
        
        $presupuestos = Presupuesto::cerrado()->simplePaginate(12);

        return view('consorcios.presupuestos.history', compact('consorcio','presupuestos'));
    }

    /**
     * @param Request $request
     * @param Consorcio $consorcio
     * @param Presupuesto $presupuesto
     * @return mixed
     */
    public function liquidar(Request $request, Consorcio $consorcio, Presupuesto $presupuesto, ConceptosLiquidablesAggregator $conceptosLiquidables)
    {
        //TODO: Validar
        $presupuesto = Presupuesto::abierto()->findOrFail($presupuesto->id);
 
        $presupuesto->liquidar($conceptosLiquidables);

        // TODO: Fash message
        return redirect()->route('consorcios.presupuestos', [$consorcio]);
    }
    
    
}

