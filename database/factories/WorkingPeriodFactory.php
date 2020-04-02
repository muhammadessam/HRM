<?php

$factory->define(App\WorkingPeriod::class, function (Faker\Generator $faker) {
    return [
        "name" => $faker->name,
        "starts_at" => $faker->date("Y-m-d H:i:s", $max = 'now'),
        "finishes_at" => $faker->date("Y-m-d H:i:s", $max = 'now'),
        "hours_needed" => $faker->randomNumber(2),
    ];
});
