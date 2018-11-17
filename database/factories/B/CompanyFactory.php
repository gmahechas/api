<?php

use Faker\Generator as Faker;

$factory->define(\App\Modules\Features\B\Company\Models\Company::class, function (Faker $faker) {

    return [
    	'company_name' => $faker->company,
        'company_identification' => $faker->creditCardNumber,
        'city_id' => \App\Modules\Features\A\City\Models\City::all()->random()->city_id
    ];
});