<?php

namespace App\Http\Controllers\Settings;

use App\Consorcio;
use App\Facades\AppExpensas;
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

        return AppExpensas::redirectPreviousTab("uf");
    }

    public function update(UpdatePropiedadRequest $request, Consorcio $consorcio)
    {
        $request->updatePropiedades();

        return AppExpensas::redirectPreviousTab("uf");
    }

    
}
