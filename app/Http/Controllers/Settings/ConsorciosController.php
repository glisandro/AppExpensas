<?php

namespace App\Http\Controllers\Settings;

use App\Consorcio;
use App\Http\Requests\ConsorcioCreateRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


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

    public function store(Request $request)
    {
        $data = $request->except('_token');
        $data['team_id'] =  Auth::user()->currentTeam()->id;

        $validator = $this->getValidator($data);

        if ($validator->fails()) {
            return redirect(url()->previous())
                ->withErrors($validator)
                ->withInput();
        }

        Consorcio::create($data);

        return back();
    }

    protected function getValidator($data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255'
        ]);
    }
}
