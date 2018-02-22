<?php

use Faker\Generator as Faker;
use App\Models\Modules\One\City;
use App\Models\Modules\Two\Person;

$factory->define(Person::class, function (Faker $faker) {

    return [
    	'person_business_type' => $faker->randomElement(['1', '2']),
        'person_identification_type' => $faker->randomElement(['1', '2']),
        'person_identification' => $faker->creditCardNumber,
        'person_first_name' => $faker->firstName,
        'person_second_name' => $faker->firstName,
        'person_first_surname' => $faker->lastName,
        'person_second_surname' => $faker->lastName,
        'person_second_surname' => $faker->lastName,
        'city_id' => City::all()->random()->city_id
    ];
});