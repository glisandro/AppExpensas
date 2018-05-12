<?php

namespace App\Http\Controllers\Settings;

use App\Consorcio;
use App\Http\Requests\ConsorcioCreateRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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

    public function store(ConsorcioCreateRequest $request)
    {
        $data = $request->all();

        Consorcio::create([
           'name' => $data['nombre'],
           'team_id' => Auth::user()->currentTeam()->id,
           'owner_id' => Auth::user()->id
        ]);

        // TODO: Flash message

        return redirect()->route('consorcio.index');
    }
}
