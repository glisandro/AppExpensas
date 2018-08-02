<?php

namespace App\Http\Controllers\Settings\Consorcio;

use App\Consorcio;
use App\Http\Requests\UpdateConsorcioRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

    public function edit(UpdateConsorcioRequest $request, Consorcio $consorcio)
    {
        $request->updateConsorcio($consorcio);

        // TODO: Flash message

        return redirect()->route('consorcio.index', $consorcio);
    }


}
