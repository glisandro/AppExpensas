<?php

namespace Tests\Unit;

use App\Consorcio;
use App\Team;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\CreatesUsers;
use Tests\TestCase;

class ConsorciosTest extends TestCase
{
    use RefreshDatabase, CreatesUsers;

    /** @test */
    function the_authenticated_user_get_only_consorcios_from_current_team()
    {
        $this->withoutExceptionHandling();

        // Creo un equipo con con un consorcio
        list($currentTeam, $currentConsorcio) = $this->createTeamWithConsorcio('Team 1', 'Consorcio 1');

        // Se registra con un equipo
        // Ingresa al sitio
        $this->actingAs($user = $this->userFromTeam($currentTeam));

        list($anotherTeam, $anotherConsorcio) = $this->createTeamWithConsorcio('Team 2', 'Consorcio 2');

        $user->teams()->attach($anotherTeam, ['role' => 'owner']);

        //Como esta logeado el global scope debe traer solo los de su "currentTeam"
        $consorcios = Consorcio::all();

        $this->assertTrue($consorcios->contains($currentConsorcio));
        $this->assertFalse($consorcios->contains($anotherConsorcio));
    }
}
