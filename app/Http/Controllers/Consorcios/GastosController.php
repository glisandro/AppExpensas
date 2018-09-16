<?php

namespace App\Http\Controllers\Consorcios;

use App\Consorcio;
use App\Http\Controllers\Controller;

class GastosController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function store(Consorcio $consorcio)
    {
    }
}
