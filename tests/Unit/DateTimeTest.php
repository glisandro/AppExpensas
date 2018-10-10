<?php

namespace Tests\Unit;

use Illuminate\Support\Carbon;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DateTimeTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testSetLocaleEs()
    {
        $mes = Carbon::createFromDate(2018, 1, 1)->formatLocalized('%B');

        $this->assertTrue($mes === "enero");
    }
}
