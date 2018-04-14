<?php

namespace App\Http\Controllers\Settings;

use App\Consorcio;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConsorcioController extends Controller
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

    public function index()
    {
        $consorcios = Consorcio::paginate(20);

        return view('settings.consorcio.index',compact('consorcios'));

    }
}
