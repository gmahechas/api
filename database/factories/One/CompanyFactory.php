<?php

use Faker\Generator as Faker;
use App\Models\One\City;
use App\Models\One\Company;

$factory->define(Company::class, function (Faker $faker) {

    return [
    	'company_name' => $faker->company,
        'company_identification' => $faker->creditCardNumber,
        'city_id' => City::all()->random()->city_id
    ];
});