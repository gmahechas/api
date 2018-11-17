<?php

use Faker\Generator as Faker;

$factory->define(\App\Modules\Features\A\City\Models\City::class, function (Faker $faker) {

    return [
        'city_name' => $faker->city,
        'city_code' => $faker->stateAbbr,
        'estate_id' => \App\Modules\Features\A\Estate\Models\Estate::all()->random()->estate_id
    ];
});