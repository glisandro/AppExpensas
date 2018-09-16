<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\CreatesUsers;
use Tests\TestCase;

class RoutesSimpleTest extends TestCase
{
    use RefreshDatabase, CreatesUsers;

    /** @test */
    public function home()
    {
        $this->get('/')
            ->assertStatus(200)
            ->assertSee('Login')
            ->assertSee('Register');
    }

    /** @test */
    public function login()
    {
        $this->get('/login')
            ->assertStatus(200)
            ->assertSee('E-Mail')
            ->assertSee('Password');
    }

    /** @test */
    public function register()
    {
        $this->get('/register')
            ->assertStatus(200)
            ->assertSee('E-Mail Address')
            ->assertSee('Password');
    }

    public function is_user_logged_in()
    {
        $user = $this->createUserWithTeam();

        $this->actingAs($user);

        $this->get('/consorcios')
            ->assertSee('Dashboard');
    }
}
