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
        factory(\App\Propiedad::class)->times(10)->create([
            'coeficiente_a' => 0.1,
            'coeficiente_d' => 0.1,
        ]);
    }
}
