<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
