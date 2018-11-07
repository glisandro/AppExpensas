<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call([
            UserTableSeeder::class,
            ConsorcioTableSeeder::class,
            PropiedadTableSeeder::class,

            RubroTableSeeder::class, // Debe estar antes de Presupuesto
            ConceptoSeeder::class,
           // PresupuestoSeeder::class,
            CuponSeeder::class,

        ]);

        Model::reguard();
    }
}
