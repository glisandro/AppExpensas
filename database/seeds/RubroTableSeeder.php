<?php

use Illuminate\Database\Seeder;

class RubroTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rubros')->insert([
            'name' => 'Servicios públicos.'
        ]);

        DB::table('rubros')->insert([
            'name' => 'Abonos de servicios.'
        ]);

        DB::table('rubros')->insert([
            'name' => 'Mantenimiento de partes comunes.'
        ]);

        DB::table('rubros')->insert([
            'name' => 'Trabajos de repareciones en unidades.'
        ]);

        DB::table('rubros')->insert([
            'name' => 'Gastos bancarios.'
        ]);

        DB::table('rubros')->insert([
            'name' => 'Gastos de limpieza.'
        ]);

        DB::table('rubros')->insert([
            'name' => 'Gastos de administracion.'
        ]);

        DB::table('rubros')->insert([
            'name' => 'Pagos del periído por seguros.'
        ]);

        DB::table('rubros')->insert([
            'name' => 'Otros.'
        ]);
    }
}
