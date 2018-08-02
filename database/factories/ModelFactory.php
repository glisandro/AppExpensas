<?php

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

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Consorcio::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'team_id' => 1
    ];
});

$factory->define(App\Propiedad::class, function (Faker $faker) {
    return [
        'denominacion' => $faker->word,
        'consorcio_id' => 1
    ];
});

$factory->define(\Laravel\Spark\Team::class, function (Faker $faker) {

    $name = $faker->unique()->company;
    $slug = str_slug($name, '-');

    return [
        'name' => $name,
        'slug' => $slug,
        'owner_id' => 1
    ];
});

$factory->define(App\Presupuesto::class, function (Faker $faker) {
    return [
        'periodo' => $faker->monthName . ' ' . $faker->year,
        'consorcio_id' => 1,
        'desde' => '2018-07-01',
        'hasta' => '2018-07-31',
        'importe_a' => 1000.01,
        'importe_b' => 0,
        'importe_c' => 0,
        'importe_d' => 0,
        'importe_e' => 0,
        'importe_f' => 0,
    ];
});
