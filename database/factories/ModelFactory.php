<?php

use App\PresupuestoDetalle;
use App\Team;
use App\User;
use App\Concepto;
use App\Consorcio;
use App\Propiedad;
use App\Presupuesto;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->firstName() . ' ' . $faker->lastName(),
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});

$factory->define(Team::class, function (Faker $faker) {

    $name = $faker->unique()->company;
    $slug = str_slug($name, '-');

    return [
        'name' => $name,
        'slug' => $slug,
        //'owner_id' => factory(User::class)->create()->id
    ];
});


$factory->define(Consorcio::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'team_id' => 1,
    ];
});

$factory->define(Propiedad::class, function (Faker $faker) {
    return [
        'denominacion' => $faker->word,
        //'consorcio_id' => 1,
        'coeficiente_a' => 0,
        'coeficiente_b' => 0,
        'coeficiente_c' => 0,
        'coeficiente_d' => 0,
        'coeficiente_e' => 0,
        'coeficiente_f' => 0,
    ];
});

$factory->define(Presupuesto::class, function (Faker $faker) {

    $periodo = \App\Facades\AppExpensas::getPeriodo($faker->year . '-' . $faker->month, 1);
    
    return [
        'periodo' => $periodo['periodo'],
        'periodo_date' => $periodo['periodo_date'],
        'consorcio_id' => 1,
        'desde' => $periodo['desde'],
        'hasta' => $periodo['hasta'],
        'total_expensa_a' => 1000.01,
        'total_expensa_b' => 0,
        'total_expensa_c' => 0,
        'total_expensa_ext_a' => 0,
        'total_expensa_ext_b' => 0,
        'total_expensa_ext_c' => 0,
        'estado' => 'cerrado'
    ];
});

$factory->state(Presupuesto::class, Presupuesto::ESTADO_CERRADO, [
    'estado' => Presupuesto::ESTADO_CERRADO,
]);

$factory->state(Presupuesto::class, Presupuesto::ESTADO_ABIERTO, [
    'estado' => Presupuesto::ESTADO_ABIERTO,
]);

$factory->define(PresupuestoDetalle::class, function (Faker $faker) {
    return [
        'presupuesto_id' => 1,
        'rubro_id' => 1,
        'concepto' => 'Factura N° 1',
        'importe_a' => 100.01,
    ];
});

$factory->define(Concepto::class, function (Faker $faker) {
    return [
        'concepto' => 'Expensas Ordinarias'
    ];
});

$factory->define(\App\Cupon::class, function (Faker $faker) {
    return [
        'propiedad_id' => 1,
        'presupuesto_id' => 1,
        'total' => 0
    ];
});

$factory->define(\App\CuponConceptos::class, function (Faker $faker) {
    return [
   
        'concepto_id' => 1,
        'importe' => 0,
        'importe_formula' => ''
    ];
});