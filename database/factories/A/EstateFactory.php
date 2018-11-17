<?php

use Faker\Generator as Faker;

$factory->define(\App\Modules\Features\A\Estate\Models\Estate::class, function (Faker $faker) {

    return [
        'estate_name' => $faker->state,
        'estate_code' => $faker->stateAbbr,
        'country_id' => \App\Modules\Features\A\Country\Models\Country::all()->random()->country_id
    ];
});