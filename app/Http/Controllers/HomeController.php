<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    /**
     * HomeController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');

        // $this->middleware('subscribed');
    }

    /**
     * @return mixed
     */
    public function show()
    {
        return view('home');
    }
}
