<?php

use Faker\Generator as Faker;
use App\Modules\Features\A\City\Models\City;
use App\Modules\Features\B\Company\Models\Company;

$factory->define(Company::class, function (Faker $faker) {

    return [
    	'company_name' => $faker->company,
        'company_identification' => $faker->creditCardNumber,
        'city_id' => City::all()->random()->city_id
    ];
});