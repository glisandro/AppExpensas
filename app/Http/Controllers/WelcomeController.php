<?php

namespace App\Http\Controllers;

class WelcomeController extends Controller
{
    /**
     * @return mixed
     */
    public function show()
    {
        return view('welcome');
    }
}
