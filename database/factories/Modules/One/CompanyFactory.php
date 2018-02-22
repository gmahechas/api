<?php

use Faker\Generator as Faker;
use App\Models\Modules\One\City;
use App\Models\Modules\One\Company;

$factory->define(Company::class, function (Faker $faker) {

    return [
    	'company_name' => $faker->company,
        'company_identification' => $faker->creditCardNumber,
        'city_id' => City::all()->random()->city_id
    ];
});