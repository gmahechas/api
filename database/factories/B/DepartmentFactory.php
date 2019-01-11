<?php

use Faker\Generator as Faker;

$factory->define(\App\Modules\Features\B\Department\Models\Department::class, function (Faker $faker) {
    return [
    	'department_name' => $faker->catchPhrase,
        'department_description' => $faker->jobTitle
    ];
});
