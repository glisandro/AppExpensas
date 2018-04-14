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
            'name' => 'Gustavo',
            'email' => 'gustavomartinez@gmail.com'
        ]);

        //Fake users
        factory(\App\User::class)->times(100)->create();
    }
}
