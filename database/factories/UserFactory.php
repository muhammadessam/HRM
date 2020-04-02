<?php

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        "name" => $faker->name,
        "email" => $faker->safeEmail,
        "password" => str_random(10),
        "role_id" => factory('App\Role')->create(),
        "matriculate" => $faker->name,
        "identity_number" => $faker->name,
        "sex" => collect(["m","f",])->random(),
        "salary" => $faker->randomFloat(2, 1, 100),
        "hire_date" => $faker->date("Y-m-d", $max = 'now'),
        "phone" => $faker->name,
        "address" => $faker->name,
        "birth_date_h" => $faker->name,
        "birth_date_m" => $faker->date("Y-m-d", $max = 'now'),
        "situation" => $faker->name,
        "remember_token" => $faker->name,
    ];
});
