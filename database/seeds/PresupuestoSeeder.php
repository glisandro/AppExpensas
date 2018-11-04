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

        factory(\App\Presupuesto::class)->states(\App\Presupuesto::ESTADO_CERRADO)->times(9)->create([
            'consorcio_id' => 1,
        ])->each(function($presupuesto){
            // generar gastos
            $rubros = \App\Rubro::all();

            foreach ($rubros as $rubro){
                $presupuesto->detalles()->saveMany(factory(\App\PresupuestoDetalle::class)->times(3)->make([
                    'concepto' => 'Concepto Det. ' . $rubro->name,
                    'rubro_id' => $rubro->id
                ]));
            }

            $presupuesto->calcularTotales();

        });

        factory(\App\Presupuesto::class)->states(\App\Presupuesto::ESTADO_ABIERTO)->times(1)->create([
            'consorcio_id' => 1,
         ])->each(function($presupuesto){
            $rubros = \App\Rubro::all();

            foreach ($rubros as $rubro){
                $presupuesto->detalles()->saveMany(factory(\App\PresupuestoDetalle::class)->times(3)->make([
                    'concepto' => 'Concepto Det. ' . $rubro->name,
                    'rubro_id' => $rubro->id
                ]));
            }

            $presupuesto->calcularTotales();

        });


    }
}
