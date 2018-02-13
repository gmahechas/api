<?php

use Faker\Generator as Faker;
use App\Models\Modules\One\Country;

$factory->define(Country::class, function (Faker $faker) {

    return [
        'country_name' => $faker->unique()->country,
        'country_code' => $faker->unique()->countryCode
    ];
});