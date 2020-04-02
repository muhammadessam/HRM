<?php

$factory->define(App\Vacation::class, function (Faker\Generator $faker) {
    return [
        "name" => $faker->name,
        "days" => $faker->randomNumber(2),
        "repetition" => collect(["y","c",])->random(),
        "accumulated" => collect(["y","n",])->random(),
        "salary_affected" => collect(["y","n",])->random(),
        "can_be_exceeded" => collect(["y","n",])->random(),
    ];
});
