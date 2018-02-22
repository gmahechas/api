<?php

use Faker\Generator as Faker;
use App\Models\Modules\Two\User;
use App\Models\Modules\Two\Person;
use App\Models\Modules\Two\Profile;

$factory->define(User::class, function (Faker $faker) {

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
        'person_id' => $faker->randomElement([NULL, Person::all()->random()->person_id]),
        'profile_id' => Profile::all()->random()->profile_id,
    ];
});