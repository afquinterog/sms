<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Message::class, function (Faker $faker) {
    return [
         'message' => $faker->realText(100),
         'status' => 1,
         'location_id' => 1
    ];
});
