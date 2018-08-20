<?php

namespace App\Http\Controllers\Settings;

use App\Consorcio;
use App\Http\Requests\UpdateConsorcioRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateConsorcioRequest;

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

        return redirect()->route('settings.consorcio.index', $lastId);
    }

    public function edit(UpdateConsorcioRequest $request, Consorcio $consorcio)
    {
        $request->updateConsorcio($consorcio);

        // TODO: Flash message

        return redirect()->route('settings.consorcio.index', $consorcio);
    }


}
