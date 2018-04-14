<?php

use Illuminate\Database\Seeder;

class ConsorcioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Consorcio::class)->times(50)->create();
    }
}
