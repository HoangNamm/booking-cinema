<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Cinema::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'address' => $faker->country,
        'tel' => $faker->tollFreePhoneNumber(),
        'description' => $faker->name,
    ];
});
