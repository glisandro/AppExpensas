<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConceptoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('conceptos')->insert([
            'concepto' => 'Expensa Ordinaria'
        ]);

        DB::table('conceptos')->insert([
            'concepto' => 'Expensa Extraordinaria'
        ]);
    }
}
