<?php

use Faker\Generator as Faker;
use App\Modules\Features\A\City\Models\City;
use App\Modules\Features\B\Office\Models\Office;
use App\Modules\Features\B\Company\Models\Company;

$factory->define(Office::class, function (Faker $faker) {

    return [
    	'office_name' => $faker->companySuffix,
        'company_id' => Company::all()->random()->company_id,
        'city_id' => City::all()->random()->city_id
    ];
});