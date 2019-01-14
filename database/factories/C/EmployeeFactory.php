<?php

use Faker\Generator as Faker;

$factory->define(\App\Modules\Features\C\Employee\Models\Employee::class, function (Faker $faker) {
    return [
    	'employee_gender' => $faker->randomElement(['male', 'female']),
        'employee_birth_date' => date('1989-08-05'),
        'employee_hire_date' => date('2013-02-13'),
        'employee_business_mail' => $faker->safeEmail,
        'person_id' => \App\Modules\Features\C\Person\Models\Person::all()->random()->person_id,
        'city_birth_id' => \App\Modules\Features\A\City\Models\City::all()->random()->city_id
    ];
});
