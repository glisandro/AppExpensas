<?php

namespace Tests;

use App\Team;
use App\User;

trait CreatesUsers
{
    public function createUserWithTeam($data = [])
    {
        $user = factory(User::class)->create(array_merge([
            'name'  => 'Owner',
            'email' => 'owner@appexpensas.com',
        ], $data));

        $user->teams()->attach(factory(Team::class)->create(['name' => 'Equipo 1', 'slug' => 'equipo-1']), ['role' => 'owner']);

        return $user;
    }
}
