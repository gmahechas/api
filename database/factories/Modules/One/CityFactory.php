<?php

use Faker\Generator as Faker;
use App\Models\Modules\One\City;
use App\Models\Modules\One\State;

$factory->define(City::class, function (Faker $faker) {

    return [
        'city_name' => $faker->city,
        'city_code' => $faker->stateAbbr,
        'state_id' => State::all()->random()->state_id
    ];
});