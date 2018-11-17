<?php

use Faker\Generator as Faker;

$factory->define(\App\Modules\Features\D\Project\Models\Project::class, function (Faker $faker) {
    return [
        'project_name' => $faker->company,
        'project_address' => $faker->address,
        'project_phone' => $faker->phoneNumber,
        'macroproject_id' => \App\Modules\Features\D\Macroproject\Models\Macroproject::all()->random()->macroproject_id
    ];
});
