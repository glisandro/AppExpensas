<?php

namespace App\Http\Controllers\Settings;

use App\Consorcio;
use App\Propiedad;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PropiedadController extends Controller
{
    public function index(Consorcio $consorcio)
    {

        $propiedades = Propiedad::where('consorcio_id', $consorcio->id)->get();

        return view('settings.propiedad.index', compact('propiedades'));
    }
}
