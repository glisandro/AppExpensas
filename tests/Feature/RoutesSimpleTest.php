<?php

namespace Tests\Feature;

use App\{
    Team, User
};
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Route;
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

    /** @test */
    function is_user_logged_ins()
    {

        list($currentTeam, $currentConsorcio) = $this->createTeamWithConsorcio('Team 1', 'Consorcio 1', 1);

        $this->actingAs($user = $this->userFromTeam($currentTeam));
        $user->switchToTeam($currentTeam);

        //$this->get('/consorcios/1')
          //  ->assertSee('Dashboard');

    }

    /** @test */
    public function settings()
    {
        $this->assertTrue(Route::has('settings.consorcio.create'));
        $this->assertTrue(Route::has('settings.consorcio.store'));
        $this->assertTrue(Route::has('settings.consorcio.index'));
        $this->assertTrue(Route::has('settings.consorcio.edit'));
        $this->assertTrue(Route::has('settings.consorcio.propiedades.store'));
        $this->assertTrue(Route::has('settings.consorcio.propiedades.update'));
    }

    /** @test */
    public function consorcios()
    {
        $this->assertTrue(Route::has('consorcios'));
    }

    /** @test */
    public function presupuestos()
    {
        $this->assertTrue(Route::has('consorcios.presupuesto.actual'));
        $this->assertTrue(Route::has('consorcios.presupuesto.selectfirst'));
        $this->assertTrue(Route::has('consorcios.presupuesto.storefirst'));
        $this->assertTrue(Route::has('consorcios.presupuesto.update'));
        $this->assertTrue(Route::has('consorcios.detalles.store'));
        $this->assertTrue(Route::has('consorcios.presupuesto.store'));
        $this->assertTrue(Route::has('consorcios.presupuesto.liquidar'));
        $this->assertTrue(Route::has('consorcios.presupuesto.cupones'));
        $this->assertTrue(Route::has('consorcios.presupuesto.history'));

    }

    /** @test */
    public function cuentacorriente()
    {
        $this->assertTrue(Route::has('consorcios.cuentacorriente.propiedades'));
        $this->assertTrue(Route::has('consorcios.cuentacorriente.show'));
    }
}
