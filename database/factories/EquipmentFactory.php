<?php

use Faker\Generator as Faker;

$factory->define(App\Equipment::class, function (Faker $faker) {
    return [
        'category_id' => App\Category::inRandomOrder()->first()->id,
        'name' => $faker->name,
        'model' => $faker->isbn10,
        'manufacturer' => $faker->name,
        'quantity' => rand(0, 10),
        'is_working' => rand(0, 1),
        'description' => implode($faker->paragraphs(rand(3, 5)), '<br><br>'),
    ];
});
