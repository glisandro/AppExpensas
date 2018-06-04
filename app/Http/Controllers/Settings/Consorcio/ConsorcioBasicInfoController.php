<?php

namespace App\Http\Controllers\Settings\Consorcio;


use App\Consorcio;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConsorcioBasicInfoController extends Controller
{
    public function edit(Request $request, Consorcio $consorcio)
    {
        $data = $request->all();

        $consorcio->name = $data['name'];
        $consorcio->save();
        
        // TODO: Flash message

        return redirect()->route('consorcio.basicinfo.index', $consorcio);
    }

    public function basicInfo(Consorcio $consorcio)
    {
        $consorcio = Consorcio::findOrFail($consorcio->id);

        return view('settings.consorcios.consorcio', compact('consorcio'));
    }
}
