<?php

use Faker\Generator as Faker;

$factory->define(\App\Modules\Features\D\Macroproject\Models\Macroproject::class, function (Faker $faker) {
    return [
        'macroproject_name' => $faker->company,
        'macroproject_address' => $faker->address,
        'macroproject_phone' => $faker->phoneNumber,
        'city_id' => \App\Modules\Features\A\City\Models\City::all()->random()->city_id,
        'office_id' => \App\Modules\Features\B\Office\Models\Office::all()->random()->office_id
    ];
});
