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

        $consorcio = \App\Consorcio::withoutGlobalScope('team_id')->find(1);

        $consorcio->propiedades()->saveMany(factory(\App\Propiedad::class)->times(10)->make([
            'coeficiente_a' => 0.1,
            'coeficiente_d' => 0.1, //Extraordinaria
        ]));

        $consorcio = \App\Consorcio::withoutGlobalScope('team_id')->find(2);

        $consorcio->propiedades()->saveMany(factory(\App\Propiedad::class)->times(10)->make([
            'coeficiente_a' => 0,
            'coeficiente_d' => 0, //Extraordinaria
        ]));

    }
}
