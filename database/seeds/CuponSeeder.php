<?php

use Illuminate\Database\Seeder;

class CuponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i < 9; $i++){
            $cupon = factory(\App\Cupon::class)->create([
                'presupuesto_id' => $i,
            ]);
            // Ordinarias
            $cupon->conceptos()->saveMany(factory(\App\CuponConcepto::class, 1)->make());
            // Extraordinarias
            $cupon->conceptos()->saveMany(factory(\App\CuponConcepto::class, 1)->make(['concepto_id' => 2]));
        }
    }
}
