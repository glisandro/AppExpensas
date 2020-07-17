<?php

namespace Tests;

use App\Consorcio;
use App\Team;
use App\User;

trait CreatesUsers
{
    public function userFromTeam($data = [])
    {
        $user = factory(User::class)->create();

        $team = factory(Team::class)->create([
            'owner_id' => $user->id
        ]);

        $user->teams()->attach($team, ['role' => 'owner']);

        return $user;
    }

    public function consorcioFromUser(User $user)
    {
        $consorcio = factory(Consorcio::class)->create();

        $user->currentTeam()->consorcios()->save($consorcio);

        return $consorcio;
    }

    public function createTeamWithConsorcio(string $teamName, string $consorcioName, int $owner_user_id)
    {
        // Crea el el segundo equipo
        $team = factory(Team::class)->create([
            'name' => $teamName,
            'owner_id' => $owner_user_id
        ]);

        // Crea un consorcio para su equipo por defecto
        $consorcio = factory(Consorcio::class)->create([
            'name' => $consorcioName,
            'team_id' => $team->id
        ]);

        // Crea un consorcio para su equipo por defecto
        $propiedades = factory(Consorcio::class)->create([
            'name' => $consorcioName,
            'team_id' => $team->id
        ]);

        return [$team, $consorcio];
    }

    public function createConsorcioWithPropiedades(Team $team, string $consorcioName)
    {
        // Crea un consorcio para su equipo por defecto
        $consorcio = Consorcio::create([
            'name' => $consorcioName,
            'team_id' => $team->id
        ]);

        // Crea un consorcio para su equipo por defecto
        $propiedades = factory(Consorcio::class)->times(30)->create();

        $consorcio->saveMany($propiedades->toArray());

        dd($consorcio->propiedades);

        return [$team, $propiedades];
    }


}