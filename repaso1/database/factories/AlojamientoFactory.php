<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Alojamiento;
use Faker\Generator as Faker;

$factory->define(Alojamiento::class, function (Faker $faker) {
    $provincias = ['Almería', 'Cadiz', 'Córdoba', 'Granada', 'Huelva', 'Jaen', 'Málaga', 'Sevilla'];
    return [
        'nombre' => $faker->company,
        'provincias' => $provincias[rand(0, 7)]
    ];
});
