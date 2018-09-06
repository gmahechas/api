<?php

use Faker\Generator as Faker;
use App\Models\One\City;
use App\Models\One\Estate;

$factory->define(City::class, function (Faker $faker) {

    return [
        'city_name' => $faker->city,
        'city_code' => $faker->stateAbbr,
        'estate_id' => Estate::all()->random()->estate_id
    ];
});