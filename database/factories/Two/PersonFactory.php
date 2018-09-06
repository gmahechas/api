<?php

use Faker\Generator as Faker;
use App\Models\One\City;
use App\Models\Two\Person;

$factory->define(Person::class, function (Faker $faker) {

    $person_business_type =  $faker->randomElement(['1', '2']);
       
    return [
    	'person_business_type' => $person_business_type,
        'person_identification_type' => $faker->randomElement(['1', '2']),
        'person_identification' => $faker->creditCardNumber,
        'person_first_name' => ($person_business_type == 1) ? $faker->firstName : '',
        'person_second_name' => ($person_business_type == 1) ? $faker->firstName : '',
        'person_first_surname' => ($person_business_type == 1) ? $faker->lastName : '',
        'person_second_surname' => ($person_business_type == 1) ? $faker->lastName : '',
        'person_legal_name' => ($person_business_type != 1) ? $faker->company : '',
        'city_id' => City::all()->random()->city_id
    ];
});