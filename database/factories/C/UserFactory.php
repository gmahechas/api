<?php

use Faker\Generator as Faker;

$factory->define(\App\Modules\Features\C\User\Models\User::class, function (Faker $faker) {

    return [
        'username' => $faker->unique()->userName,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'person_id' => \App\Modules\Features\C\Person\Models\Person::all()->random()->person_id,
        'profile_id' => \App\Modules\Features\C\Profile\Models\Profile::all()->random()->profile_id,
    ];
});