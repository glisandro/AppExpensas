<?php

namespace App\Http\Controllers\Settings\Consorcio;

use App\Consorcio;
use App\Propiedad;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ConsorcioPropiedadController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function store(Request $request, Consorcio $consorcio)
    {
        $data = $request->all();
        $data['consorcio_id'] = $consorcio->id;

        $validator = $this->getValidator($data);

        if ($validator->fails()) {
            return $this->redirectPreviousTab("uf")
                ->withErrors($validator)
                ->withInput();
        }

        Propiedad::create($data);

        return $this->redirectPreviousTab("uf");

    }

    public function update(Request $request, Consorcio $consorcio)
    {
        $formData = $request->input('propiedades');

        foreach ($formData as $row) {

            $validator = $this->getValidator($row);

            if ($validator->fails()) {
                return $this->redirectPreviousTab("uf")
                    ->withErrors($validator)
                    ->withInput();
            }

            $propiedad = Propiedad::findOrFail($row['id']);
            $propiedad->denominacion = $row['denominacion'];
            $propiedad->coeficiente_a = $row['coeficiente_a'];
            $propiedad->coeficiente_b = $row['coeficiente_b'];
            $propiedad->coeficiente_c = $row['coeficiente_c'];
            $propiedad->save();

        }

        return $this->redirectPreviousTab("uf");
    }

    protected function redirectPreviousTab($tab)
    {
        return redirect(url()->previous() . "#/" . $tab);
    }

    protected function getValidator($data)
    {
        $coeficienteRules = 'numeric|min:0|max:1';

        return Validator::make($data, [
            'denominacion' => 'required|max:255',
            'coeficiente_a' => $coeficienteRules,
            'coeficiente_b' => $coeficienteRules,
            'coeficiente_c' => $coeficienteRules,
            'coeficiente_d' => $coeficienteRules,
            'coeficiente_e' => $coeficienteRules,
            'coeficiente_f' => $coeficienteRules,
        ]);
    }
}
