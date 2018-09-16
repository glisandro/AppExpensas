<?php

namespace Tests\Unit;

use App\Consorcio;
use App\Team;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\CreatesUsers;
use Tests\TestCase;

class ConsorciosTest extends TestCase
{
    use RefreshDatabase, CreatesUsers;

    /** @test */
    public function if_the_team_global_scope_works()
    {
        $this->withoutExceptionHandling();

        // Se registra con un equipo
        $user = $this->createUserWithTeam();

        // Ingresa al sitio
        $this->actingAs($user);

        // Crea el el segundo equipo
        $team2 = factory(Team::class)->create(['name' => 'Equipo 2', 'slug' => 'equipo-2']);

        $user->teams()->attach($team2, ['role' => 'owner']);

        // Crea un consorcio para su equipo por defecto
        factory(Consorcio::class)->create([
            'name'    => 'Equipo 1',
            'team_id' => $user->currentTeam()->id,
        ]);

        // Crea un consorcio para su equipo por defecto
        factory(Consorcio::class)->create([
            'name'    => 'Consorcio para el segundo equipo',
            'team_id' => $team2->id,
        ]);

        //Como esta logeado el global scope debe traer solo los de su "currentTeam"
        $consorcios = Consorcio::all();

        foreach ($consorcios as $consorcio) {
            $this->assertTrue($consorcio->team_id === $user->currentTeam()->id);
        }
    }
}
