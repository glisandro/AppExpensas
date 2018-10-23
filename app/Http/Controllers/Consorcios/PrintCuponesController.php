<?php

namespace App\Http\Controllers\Consorcios;

use App\Consorcio;
use App\Presupuesto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PrintCuponesController extends Controller
{
    /**
     * @param Presupuesto $presupuesto
     * @param Consorcio $consorcio
     * @return mixed
     */
    public function __invoke(Consorcio $consorcio, Presupuesto $presupuesto)
    {
        if($presupuesto->estado == Presupuesto::ESTADO_CERRADO){
            $data = $presupuesto->cupones();
        } else {
            $data = $this->getSampleData();
        }

        $date = date('Y-m-d');
        $invoice = "2222";
        $view =  \View::make('consorcios.presupuestos.cupones', compact('data', 'date', 'invoice'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('invoice');
    }

    /**
     * @return array
     */
    public function getSampleData()
    {
        $data =  [
            'quantity'      => '1' ,
            'description'   => 'some ramdom text',
            'price'   => '500',
            'total'     => '500'
        ];
        return $data;
    }
}
