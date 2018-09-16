<?php

namespace App\Http\Requests;

use App\Consorcio;
use App\Propiedad;
use Illuminate\Foundation\Http\FormRequest;

class CreatePropiedadRequest extends FormRequest
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
        $coeficienteRules = 'numeric|min:0|max:1';

        return [
            'denominacion'  => 'required|max:255',
            'coeficiente_a' => $coeficienteRules,
            'coeficiente_b' => $coeficienteRules,
            'coeficiente_c' => $coeficienteRules,
            'coeficiente_d' => $coeficienteRules,
            'coeficiente_e' => $coeficienteRules,
            'coeficiente_f' => $coeficienteRules,
        ];
    }

    public function createPropiedad(Consorcio $consorcio)
    {
        Propiedad::create([
            'denominacion'  => $this->denominacion,
            'consorcio_id'  => $consorcio->id,
            'coeficiente_a' => $this->coeficiente_a,
            'coeficiente_b' => $this->coeficiente_b,
            'coeficiente_c' => $this->coeficiente_c,
            'coeficiente_d' => $this->coeficiente_d,
            'coeficiente_e' => $this->coeficiente_e,
            'coeficiente_f' => $this->coeficiente_f,
        ]);
    }

    /**
     * Get the URL to redirect to on a validation error.
     *
     * @return string
     */
    protected function getRedirectUrl()
    {
        $url = $this->redirector->getUrlGenerator();

        return $url->previous().'#/uf';
    }
}
