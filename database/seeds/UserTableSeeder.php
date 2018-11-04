<?php

use App\Team;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Admin
        $owner = factory(\App\User::class, 1)->create([
            'name' => 'Admin',
            'email' => 'admin@appexpensas.com'
        ])->each(function ($u) {
            $u->teams()->attach(factory(Team::class)->create(['owner_id' => $u->id]), ['role' => 'owner']);
        });

        //Fake users
        $users = factory(\App\User::class)->times(99)->create();

        $owner[0]->teams[0]->users()->attach($users, ['role' => 'member']);


    }
}
