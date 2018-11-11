<?php

use Faker\Generator as Faker;

$factory->define(App\Colors::class, function (Faker $faker) {
    return [
        //
        'name' => $faker->colorName,
        'user_id'=> $faker->numberBetween(1, 2),
    ];
});
