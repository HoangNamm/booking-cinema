<?php

use Faker\Generator as Faker;

$factory->define(App\Models\PermissionDetail::class, function (Faker $faker) {
    return [
        'action_name' => $faker->text($maxNbChars = 20),
        'action_code' => $faker->text($maxNbChars = 20),
        'check_action' => 1
    ];
});
