<?php

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
        factory(\App\User::class)->times(1)->create([
            'name' => 'Admin',
            'email' => 'admin@appexpensas.com'
        ])->each(function($u){
            $u->teams()->attach(factory(\Laravel\Spark\Team::class)->create(),['role' => 'owner']);
        });

        //Fake users
        factory(\App\User::class)->times(100)->create()->each(function($u){
            $u->teams()->attach(factory(Team::class)->create(),['role' => 'owner']); // El array del segundo argumento se usa en la tabla pivot
        });
    }
}
