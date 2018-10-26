<?php

namespace Tests;

use App\Consorcio;
use App\Team;
use App\User;

trait CreatesUsers
{
    public function userFromTeam(Team $team, $data = [])
    {

        $user = factory(User::class)->create(array_merge([
            'name' => 'Owner',
            'email' => 'owner@appexpensas.com'
        ], $data));

        $user->teams()->attach($team, ['role' => 'owner']);

        return $user;
    }

    public function createTeamWithConsorcio(string $teamName, string $consorcioName)
    {

        // Crea el el segundo equipo
        $team = factory(Team::class)->create([
            'name' => $teamName,
        ]);

        // Crea un consorcio para su equipo por defecto
        $consorcio = factory(Consorcio::class)->create([
            'name' => $consorcioName,
            'team_id' => $team->id
        ]);

        return [$team, $consorcio];
    }


}