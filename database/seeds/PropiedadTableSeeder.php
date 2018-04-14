<?php

use Illuminate\Database\Seeder;

class PropiedadTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Propiedad::class)->times(30)->create();
    }
}
