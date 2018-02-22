<?php

use Faker\Generator as Faker;
use App\Models\Modules\One\State;
use App\Models\Modules\One\Country;

$factory->define(State::class, function (Faker $faker) {

    return [
        'state_name' => $faker->state,
        'state_code' => $faker->stateAbbr,
        'country_id' => Country::all()->random()->country_id
    ];
});