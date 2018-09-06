<?php

use Faker\Generator as Faker;
use App\Models\Modules\One\City;
use App\Models\Modules\One\Office;
use App\Models\Modules\Three\Macroproject;

$factory->define(Macroproject::class, function (Faker $faker) {
    return [
        'macroproject_name' => $faker->company,
        'macroproject_address' => $faker->address,
        'macroproject_phone' => $faker->phoneNumber,
        'city_id' => City::all()->random()->city_id,
        'office_id' => Office::all()->random()->office_id
    ];
});
