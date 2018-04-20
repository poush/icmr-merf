<?php

use Faker\Generator as Faker;

$factory->define(App\Institute::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'slug' => str_slug($faker->isbn10),
        'city' => $faker->city
    ];
});
