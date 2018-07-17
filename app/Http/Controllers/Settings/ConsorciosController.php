<?php

namespace App\Http\Controllers\Settings;

use App\Consorcio;
use App\Http\Requests\ConsorcioCreateRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ConsorciosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Get all of the consorcios for the current user.
     *
     * @param  Request  $request
     * @return Response
     */

    public function all()
    {
        $consorcios = Consorcio::paginate(20);

        return view('settings.consorcios', compact('consorcios'));
    }
    
}
