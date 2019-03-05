<?php

use Faker\Generator as Faker;

$factory->define(App\school_details::class, function (Faker $faker) {
    return [
                'first_name' => $faker->name,
                'last_name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'school_name' => $faker->name,
                'school_rating'=> rand(1,5),

    ];
});
