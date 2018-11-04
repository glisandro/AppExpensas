<?php

namespace App\Http\Requests;

use App\Consorcio;
use App\Facades\AppExpensas;
use App\Presupuesto;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;

class CreatePresupuestoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return Presupuesto::RULES;
    }

    public function createPresupuesto(Consorcio $consorcio)
    {
        $periodo_date = ($this->input('periodo_date')) ?? $this->getNextPeriodoDate();

        $periodo = AppExpensas::getPeriodo($periodo_date);

        return DB::transaction(function () use ($periodo, $consorcio) {
            return Presupuesto::create(array(
                'periodo' => $periodo['periodo'],
                'periodo_date' => $periodo['periodo_date'],
                'desde' => $periodo['desde'],
                'hasta' => $periodo['hasta'],
                'consorcio_id' => $consorcio->id,
                'estado' => Presupuesto::ESTADO_ABIERTO
            ));
        });
    }

    public function getNextPeriodoDate()
    {
        $presupuesto = Presupuesto::latest()->first();

        if ($presupuesto->estado != Presupuesto::ESTADO_CERRADO){
            throw new Exception('El presupuesto anterior debe estar cerrado.');
        }

        $nextPeriodoDate = Carbon::parse($presupuesto->periodo_date);

        return $nextPeriodoDate->addMonth()->format('Y-m');

    }
}
