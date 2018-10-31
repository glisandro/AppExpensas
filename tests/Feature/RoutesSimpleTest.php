<?php

namespace Tests\Feature;

use App\{
    Team, User
};
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\CreatesUsers;
use Tests\TestCase;

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

    /** @test */
    function is_user_logged_in()
    {

        list($team, $consorcio) = $this->createTeamWithConsorcio('Team 1', 'Consorcio 1', 1);

        $user = $this->userFromTeam($team);

        $this->actingAs($user);

        $this->get('/consorcios')
            ->assertStatus(200)
            ->assertSee('Dashboard')
            ->assertSee($consorcio->name);
    }
}
