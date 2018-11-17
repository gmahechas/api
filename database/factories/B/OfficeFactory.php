<?php

use Faker\Generator as Faker;

$factory->define(\App\Modules\Features\B\Office\Models\Office::class, function (Faker $faker) {

    return [
    	'office_name' => $faker->companySuffix,
        'company_id' => \App\Modules\Features\B\Company\Models\Company::all()->random()->company_id,
        'city_id' => \App\Modules\Features\A\City\Models\City::all()->random()->city_id
    ];
});