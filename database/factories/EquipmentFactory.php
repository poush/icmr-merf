<?php

use Faker\Generator as Faker;

$factory->define(App\Equipment::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'model' => $faker->isbn10,
        'manufacturer' => $faker->name
    ];
});
