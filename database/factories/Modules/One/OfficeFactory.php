<?php

use Faker\Generator as Faker;
use App\Models\Modules\One\City;
use App\Models\Modules\One\Office;
use App\Models\Modules\One\Company;

$factory->define(Office::class, function (Faker $faker) {

    return [
    	'office_name' => $faker->companySuffix,
        'company_id' => Company::all()->random()->company_id,
        'city_id' => City::all()->random()->city_id
    ];
});