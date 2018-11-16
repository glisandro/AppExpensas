<?php

namespace Tests\Feature;

use App\{
    Consorcio, Team, User
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
    function is_user_sees_the_list_of_consorcios_after_logging_in()
    {
        $user = $this->userFromTeam();

        $currentConsorcio = $this->consorcioFromUser($user);

        //list($currentTeam, $currentConsorcio) = $this->createTeamWithConsorcio('Team 1', 'Consorcio 1', 1);

        $this->actingAs($user);

        $this->get('/consorcios')
            ->assertStatus(200)
            ->assertSee('Dashboard')
            ->assertSee($currentConsorcio->name);
    }

    /** @test */
    // si no tiene propiedades deberia ser redirigido al settings de uf para con el mensaje para que ingrese al menos una
    function is_user_logged_ins_esta_es_otro()
    {
        $user = $this->userFromTeam();

        $currentConsorcio = $this->consorcioFromUser($user);

        $this->actingAs($user);

        $this->get('/consorcios/' . $currentConsorcio->id)
            ->assertStatus(302)
            ->assertRedirect('/settings/consorcios/'. $currentConsorcio->id . '#/uf');
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
        $this->assertTrue(Route::has('consorcios.presupuesto.detalle.store'));
        $this->assertTrue(Route::has('consorcios.presupuesto.detalle.delete'));
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
