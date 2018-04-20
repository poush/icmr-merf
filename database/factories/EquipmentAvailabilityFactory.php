<?php

use Faker\Generator as Faker;

$factory->define(App\EquipmentAvailability::class, function (Faker $faker) {
    $to = $faker->dateTimeThisMonth(Carbon\Carbon::today()->endOfMonth());

    return [
        'to' => $to,
        'from' => $faker->dateTimeThisMonth($to),
    ];
});
