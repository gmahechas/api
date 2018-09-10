<?php

use Faker\Generator as Faker;
use App\Models\Two\User;
use App\Models\Two\Person;
use App\Models\Two\Profile;

$factory->define(User::class, function (Faker $faker) {

    return [
        'username' => $faker->unique()->userName,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
        'person_id' => Person::all()->random()->person_id,
        'profile_id' => Profile::all()->random()->profile_id,
    ];
});