<?php

namespace App\Http\Controllers\Consorcios;

use App\Consorcio;
use App\Expensas\Liquidacion\Conceptos\ConceptosLiquidablesAggregator;
use App\Expensas\Liquidacion\Conceptos\ExpenasOrinarias;
use App\Facades\AppExpensas;
use App\Http\Requests\CreatePresupuestoRequest;
use App\Presupuesto;
use App\Rubro;
use Laravel\Spark\Http\Controllers\Controller;

class PresupuestoController extends Controller
{

    protected $conceptosLiquidables;

    /**
     * PresupuestoController constructor.
     * @param ConceptosLiquidablesAggregator $conceptosLiquidables
     */
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware('RedirectIfNotHavePropiedad');

        $this->middleware('RedirectIfNotHavePresupuesto', ['except' => array('selectfirst', 'storefirst')]);

    }

    /**
     * @param Consorcio $consorcio
     * @param int $mes
     * @return mixed
     */
    public function selectfirst(Consorcio $consorcio, $periodo = null)
    {
        $periodoSeleccionado = AppExpensas::getPeriodo($periodo);

        $periodosPaginate = \Carbon\Carbon::parse($periodoSeleccionado['periodo_date'])->subMonth(3);

        return view('consorcios.presupuesto.first', compact('consorcio', 'periodoSeleccionado', 'periodosPaginate'));
    }

    /**
     * @param CreatePresupuestoRequest $request
     * @param Consorcio $consorcio
     * @param Presupuesto $presupuesto
     * @return mixed
     */
    public function storefirst(CreatePresupuestoRequest $request, Consorcio $consorcio)
    {
        //TODO: VALIDAR QUE SEA AL PRIMERO
        if (Presupuesto::hasAbierto()){
            return redirect()->route('consorcios.presupuesto.actual');
        }
        $presupuesto = $request->createPresupuesto($consorcio);

        if ($presupuesto) {
            //return redirect()->action('Consorcios\\PresupuestoController@actual', ['consorcio' => $consorcio]);
            return redirect()->route('consorcios.presupuesto.actual', $consorcio);
        }
    }

    /**
     * @param Consorcio $consorcio
     * @param Presupuesto $presupuesto
     * @return mixed
     */
    public function actual(CreatePresupuestoRequest $request, Consorcio $consorcio)
    {
        if (!Presupuesto::hasAbierto()){
            $request->createPresupuesto($consorcio);
        }

        $hasHistory = Presupuesto::hasCerrados();
        //TODO: DEBERIA HABIAR UNA FORMA DE VALIDAR QUE SOLO PUEDA TENER UN SOLO PRESUPUESTO ABIERTO
        $presupuesto = Presupuesto::abierto();

        $rubros = Rubro::all();

        return view('consorcios.presupuesto.actual', compact('consorcio', 'presupuesto', 'hasHistory', 'rubros'));
    }


    /**
     * @param Consorcio $consorcio
     * @return mixed
     */
    public function history(Consorcio $consorcio)
    {
        $hasHistory = Presupuesto::hasCerrados();

        if (!$hasHistory) {
            return redirect()->route('consorcios.presupuesto.actual', $consorcio)->with('warning', __('No hay presupuestos cerrados'));
        }

        $presupuestos = Presupuesto::cerrado()->simplePaginate(12);

        return view('consorcios.presupuesto.history', compact('consorcio', 'presupuestos'));
    }

    public function historyshow(Consorcio $consorcio, Presupuesto $presupuesto)
    {
        $hasHistory = Presupuesto::hasCerrados();

        $rubros = Rubro::all();
        //TODO: CAMBIAR A VISTA NO EDITABLE
        return view('consorcios.presupuesto.actual', compact('consorcio', 'presupuesto', 'hasHistory', 'rubros'));
    }

}

