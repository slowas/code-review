<?php

use Faker\Generator as Faker;

$factory->define(App\Advertisement::class, function (Faker $faker) {
    return [
        'title' => $faker->words(8, 5),
        'description' => $faker->text(200),
        'user_id' => \App\User::first(),
    ];
});