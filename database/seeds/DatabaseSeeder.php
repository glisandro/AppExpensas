<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
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

        $this->call(UserTableSeeder::class);

        $this->call(ConsorcioTableSeeder::class);

        $this->call(PropiedadTableSeeder::class);

        $this->call(PresupuestoSeeder::class);

        $this->call(ConceptoSeeder::class);

        Model::reguard();
    }
}
