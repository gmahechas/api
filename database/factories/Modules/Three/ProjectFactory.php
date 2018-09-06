<?php

use Faker\Generator as Faker;
use App\Models\Modules\Three\Project;
use App\Models\Modules\Three\Macroproject;

$factory->define(Project::class, function (Faker $faker) {
    return [
        'project_name' => $faker->company,
        'project_address' => $faker->address,
        'project_phone' => $faker->phoneNumber,
        'macroproject_id' => Macroproject::all()->random()->macroproject_id
    ];
});
