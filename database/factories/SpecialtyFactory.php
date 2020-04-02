<?php

$factory->define(App\Specialty::class, function (Faker\Generator $faker) {
    return [
        "name" => $faker->name,
    ];
});
