<?php

namespace App\Http\Controllers\Consorcios;

use App\Consorcio;
use App\Expensas\Liquidacion\Conceptos\ConceptosLiquidablesAggregator;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePresupuestoRequest;
use App\Presupuesto;
use App\PresupuestoDetalle;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Request;

class PresupuestoLiquidacionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware('RedirectIfNotHavePropiedad');

        $this->middleware('RedirectIfNotHavePresupuesto');
    }

    public function detallestore(Request $request, Consorcio $consorcio)
    {
        $presupuesto = Presupuesto::abierto();

        $data = $request->all();
        // TODO: Validar detalles

        $detalle = new PresupuestoDetalle([
            'concepto' => $data['concepto'],
            'rubro_id' => $data['rubro_id'],
            'importe_a' => $data['importe_a'],
            'importe_b' => $data['importe_b'],
            'importe_c' => $data['importe_c'],
        ]);

        // TODO: RESOLVER EXTRAORDINARIAS
        $presupuesto->saveDetalle($detalle);

        return back()->with('success', __('El guardó correctamente'));
    }

    /**
     * @param Request $request
     * @param Consorcio $consorcio
     * @param ConceptosLiquidablesAggregator $conceptosLiquidables
     * @return mixed
     */
    public function liquidar(Request $request, Consorcio $consorcio, Presupuesto $presupuesto, ConceptosLiquidablesAggregator $conceptosLiquidables)
    {
        if ($presupuesto && $presupuesto->estado != Presupuesto::ESTADO_ABIERTO){
            return redirect()->route('consorcios.presupuesto.history', $consorcio)->with('warnings', __('El presupuesto ya se encuentra liquidado.'));
        }

        //$request->validate(Presupuesto::RULES, Presupuesto::MESSAJES); no deberia validar nada porque solo liquida, no modifica

        $presupuesto->liquidar($conceptosLiquidables);

        return redirect()->route('consorcios.presupuesto.history.show', [$consorcio, $presupuesto])->with('success', __('Se liquidó el presupuesto.'));
    }

    /**
     * @param CreatePresupuestoRequest $request
     * @param Consorcio $consorcio
     * @return mixed
     */
    /*public function store(CreatePresupuestoRequest $request, Consorcio $consorcio)
    {
        $presupuesto = $request->createPresupuesto($request->input('periodo_date'));

        if ($presupuesto) {
            return redirect()->route('consorcios.presupuesto.actual', $consorcio);
        }

        return back()->with('error', __('Ups!!, algo salió mal.'));
    }*/

    /**
     * @param Request $request
     * @param Consorcio $consorcio
     * @param Presupuesto $presupuesto
     * @return mixed
     */
    public function update(Request $request, Consorcio $consorcio)
    {
        //TODO: Validar
        $presupuesto = Presupuesto::abierto();

        $input = $request->all();

        //TODO:SE PODRIA DARLE FORMATO CON CASTS ?
        $input['total_expensa_a'] = str_replace(',', '.', $input['total_expensa_a']);
        $input['total_expensa_b'] = str_replace(',', '.', $input['total_expensa_b']);
        $input['total_expensa_c'] = str_replace(',', '.', $input['total_expensa_c']);
        $input['total_expensa_ext_a'] = str_replace(',', '.', $input['total_expensa_ext_a']);
        $input['total_expensa_ext_b'] = str_replace(',', '.', $input['total_expensa_ext_b']);
        $input['total_expensa_ext_c'] = str_replace(',', '.', $input['total_expensa_ext_c']);
        $request->replace($input);

        $request->validate(Presupuesto::RULES, Presupuesto::MESSAJES);

        $presupuesto->total_expensa_a = $request->input('total_expensa_a');
        $presupuesto->total_expensa_b = $request->input('total_expensa_b');
        $presupuesto->total_expensa_c = $request->input('total_expensa_c');
        $presupuesto->total_expensa_ext_a = $request->input('total_expensa_ext_a');
        $presupuesto->total_expensa_ext_b = $request->input('total_expensa_ext_b');
        $presupuesto->total_expensa_ext_c = $request->input('total_expensa_ext_c');
        $presupuesto->save();

        // TODO: Fash message
        return redirect()->route('consorcios.presupuesto.actual', $consorcio)->with('success', __('Se actualizó correctemante.'));
    }

    /**
     * @param Request $request
     * @param Consorcio $consorcio
     * @return mixed
     */
    public function delete(Request $request, Consorcio $consorcio)
    {
        $presupuesto = Presupuesto::abierto();

        if ($presupuesto){

            $presupuesto->detalles()->delete();
            $presupuesto->delete();

            Session::flash('success', 'Se eliminó correctamente.');
        }

        return back();
    }

}
