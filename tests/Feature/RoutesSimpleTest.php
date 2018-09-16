<?php

namespace Tests\Feature;

use App\{Team,User};
use Tests\CreatesUsers;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RoutesSimpleTest extends TestCase
{
    use RefreshDatabase, CreatesUsers;
    
    /** @test */
    function home()
    {
        $this->get('/')
            ->assertStatus(200)
            ->assertSee('Login')
            ->assertSee('Register');
    }

    /** @test */
    function login()
    {
        $this->get('/login')
            ->assertStatus(200)
            ->assertSee('E-Mail')
            ->assertSee('Password');
    }

    /** @test */
    function register()
    {
        $this->get('/register')
            ->assertStatus(200)
            ->assertSee('E-Mail Address')
            ->assertSee('Password');
    }

    public function is_user_logged_in()  {

        $user = $this->createUserWithTeam();

        $this->actingAs($user);

        $this->get('/consorcios')
            ->assertSee('Dashboard');
    }
}
