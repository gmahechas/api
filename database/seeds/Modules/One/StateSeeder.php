<?php

use Illuminate\Database\Seeder;
use App\Models\Modules\One\State;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        State::truncate();
        State::flushEventListeners();
        factory(State::class, 30)->create();
    }
}
