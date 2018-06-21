<?php

use Faker\Generator as Faker;
use App\Models\Modules\One\Estate;
use App\Models\Modules\One\Country;

$factory->define(Estate::class, function (Faker $faker) {

    return [
        'estate_name' => $faker->state,
        'estate_code' => $faker->stateAbbr,
        'country_id' => Country::all()->random()->country_id
    ];
});