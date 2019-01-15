<?php

use Faker\Generator as Faker;

$factory->define(\App\Modules\Features\C\Person\Models\Person::class, function (Faker $faker) {
       
    $type_person_id = \App\Modules\Features\C\TypePerson\Models\TypePerson::all()->random()->type_person_id;
    
    return [
        'person_identification' => $faker->ein,
        'person_identification_date_issue' => $faker->date('Y-m-d', 'now'),
        'person_first_name' => ($type_person_id == 1) ? $faker->firstName : '',
        'person_second_name' => ($type_person_id == 1) ? $faker->firstName : '',
        'person_first_surname' => ($type_person_id == 1) ? $faker->lastName : '',
        'person_second_surname' => ($type_person_id == 1) ? $faker->lastName : '',
        'person_legal_name' => ($type_person_id != 1) ? $faker->company : '',
        'person_address' => $faker->address,
        'person_email' => $faker->safeEmail,
        'person_phone' => $faker->phoneNumber,
        'type_person_id' => $type_person_id,
        'type_person_identification_id' => \App\Modules\Features\C\TypePersonIdentification\Models\TypePersonIdentification::all()->random()->type_person_identification_id,
        'city_issue_id' => \App\Modules\Features\A\City\Models\City::all()->random()->city_id,
        'city_location_id' => \App\Modules\Features\A\City\Models\City::all()->random()->city_id
    ];
});