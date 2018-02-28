<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Application::class, function (Faker $faker) {
    return [
      'code' => $faker->numberBetween(1, 9000),
      'name' => $faker->sentence(3,false)
    ];
});
