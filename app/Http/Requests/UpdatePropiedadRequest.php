<?php

namespace App\Http\Requests;

use App\Propiedad;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;

class UpdatePropiedadRequest extends FormRequest
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
            'propiedades.*.denominacion' => 'required|max:255',
            'propiedades.*.coeficiente_a' => $coeficienteRules,
            'propiedades.*.coeficiente_b' => $coeficienteRules,
            'propiedades.*.coeficiente_c' => $coeficienteRules,
            'propiedades.*.coeficiente_d' => $coeficienteRules,
            'propiedades.*.coeficiente_e' => $coeficienteRules,
            'propiedades.*.coeficiente_f' => $coeficienteRules,

        ];
    }

    public function updatePropiedades()
    {
        $formPropiedades = $this->input('propiedades');

        if ($formPropiedades) {
            DB::transaction(function () {
                foreach ($this->all()['propiedades'] as $row) {
                    $propiedad = Propiedad::findOrFail($row['id']);
                    $propiedad->denominacion = $row['denominacion'];
                    $propiedad->coeficiente_a = $row['coeficiente_a'];
                    $propiedad->coeficiente_b = $row['coeficiente_b'];
                    $propiedad->coeficiente_c = $row['coeficiente_c'];
                    $propiedad->coeficiente_d = $row['coeficiente_d'];
                    $propiedad->coeficiente_e = $row['coeficiente_e'];
                    $propiedad->coeficiente_f = $row['coeficiente_f'];
                    $propiedad->save();
                }
            });
        }
    }

    /**
     * Get the URL to redirect to on a validation error.
     *
     * @return string
     */
    protected function getRedirectUrl()
    {
        $url = $this->redirector->getUrlGenerator();

        return $url->previous() . "#/uf";
    }
}
