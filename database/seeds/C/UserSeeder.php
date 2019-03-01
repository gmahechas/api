<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Modules\Features\C\User\Models\User::truncate();
        \App\Modules\Features\C\User\Models\User::flushEventListeners();
        \App\Modules\Features\C\User\Models\User::create([
            'username' => 'gmahechas',
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'person_id' => 1,
            'profile_id' => 1,
        ]);
        \App\Modules\Features\C\User\Models\User::create([
            'username' => 'avanegas',
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'person_id' => 2,
            'profile_id' => 1,
        ]);
        \App\Modules\Features\C\User\Models\User::create([
            'username' => 'jvalencia',
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'person_id' => 3,
            'profile_id' => 1,
        ]);
        \App\Modules\Features\C\User\Models\User::create([
            'username' => 'asantos',
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'person_id' => 4,
            'profile_id' => 1,
        ]);
    }
}
