<?php

namespace App\Http\Controllers\Settings;

use App\Consorcio;
use App\Facades\AppExpensas;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateConsorcioRequest;
use App\Http\Requests\UpdateConsorcioRequest;

class ConsorcioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Consorcio $consorcio)
    {
        return view('settings.consorcios.consorcio', compact('consorcio'));
    }

    public function create()
    {
        return view('settings.consorcios.create');

    }

    public function store(CreateConsorcioRequest $request)
    {
        $lastId = $request->createConsorcio();

        return redirect(route('settings.consorcio.index', $lastId) . "#/uf")->with('success', __('Ingrese las Unidades Funcionales del consorcio.'));
    }

    public function edit(UpdateConsorcioRequest $request, Consorcio $consorcio)
    {
        $request->updateConsorcio($consorcio);

        // TODO: Flash message
        return redirect()->route('settings.consorcio.index', $consorcio);
    }


}
