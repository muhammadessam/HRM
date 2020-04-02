<?php

$factory->define(App\Degree::class, function (Faker\Generator $faker) {
    return [
        "name" => $faker->name,
    ];
});
