<?php

use Illuminate\Database\Seeder;

class PresupuestoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Consorcio 1
        factory(\App\Presupuesto::class)->times(20)->create([
            'consorcio_id' => 1,
        ])->each(function($u){
            //$u->teams()->attach(factory(\Laravel\Spark\Team::class)->create(),['role' => 'owner']);
        });
    }
}
