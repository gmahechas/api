<?php

use Faker\Generator as Faker;
use App\Modules\Features\A\Estate\Models\Estate;
use App\Modules\Features\A\Country\Models\Country;

$factory->define(Estate::class, function (Faker $faker) {

    return [
        'estate_name' => $faker->state,
        'estate_code' => $faker->stateAbbr,
        'country_id' => Country::all()->random()->country_id
    ];
});