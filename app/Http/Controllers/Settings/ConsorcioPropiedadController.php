<?php

namespace App\Http\Controllers\Settings;

use App\Consorcio;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePropiedadRequest;
use App\Http\Requests\UpdatePropiedadRequest;

class ConsorcioPropiedadController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(CreatePropiedadRequest $request, Consorcio $consorcio)
    {
        $request->createPropiedad($consorcio);

        return $this->redirectPreviousTab("uf");
    }

    public function update(UpdatePropiedadRequest $request, Consorcio $consorcio)
    {
        $request->updatePropiedades();

        return $this->redirectPreviousTab("uf");
    }

    protected function redirectPreviousTab($tab)
    {
        return redirect(url()->previous() . "#/" . $tab);
    }
}
