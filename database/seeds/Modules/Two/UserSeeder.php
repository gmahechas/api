<?php

use Illuminate\Database\Seeder;
use App\Models\Modules\Two\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        User::flushEventListeners();
        factory(User::class, 3)->create();
    }
}
