<?php

use Faker\Generator as Faker;

$factory->define(\App\Modules\Features\A\Country\Models\Country::class, function (Faker $faker) {

    return [
        'country_name' => $faker->country,
        'country_code' => $faker->countryCode
    ];
});