<?php

use Faker\Generator as Faker;
use App\AvailabilityType;

$factory->define(AvailabilityType::class, function (Faker $faker) {
    $types = ['default','blocked_slot','booked_slot'];
    return [
        'type'=>$faker->randomElement($types)
    ];
});
