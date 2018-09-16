<?php

namespace Tests\Unit;

use Illuminate\Support\Facades\Route;
use Tests\TestCase;

class HasRouteNames extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function consorcios()
    {
        $this->assertTrue(Route::has('consorcios.redirectToDefaultSection'));
    }
}
