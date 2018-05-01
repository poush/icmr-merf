<?php

use Faker\Generator as Faker;

$factory->define(App\Equipment::class, function (Faker $faker) {
    $slots = ['hours', 'minutes'];
    return [
        'category_id' => App\Category::inRandomOrder()->first()->id,
        'name' => $faker->name,
        'model' => $faker->isbn10,
        'manufacturer' => $faker->name,
        'quantity' => rand(0, 10),
        'is_working' => rand(0, 1),
        'description' => implode($faker->paragraphs(rand(3, 5)), '<br><br>'),
        'features' => implode($faker->paragraphs(rand(2, 3)), '<br><br>'),
        'machine_rest' => rand(2, 8) . ' ' . $slots[rand(0, 1)]
    ];
});
