<?php

use Faker\Generator as Faker;

$factory->define(App\Institute::class, function (Faker $faker) {
    $name = $faker->name;
    return [
        'name' => $name,
        'slug' => str_slug($name),
        'city' => $faker->city,
        'phone' => $faker->e164PhoneNumber,
        'email' => $faker->unique()->safeEmail,
    ];
});
