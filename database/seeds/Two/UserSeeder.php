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
        factory(\App\Modules\Features\C\User\Models\User::class, 5)->create();
    }
}
