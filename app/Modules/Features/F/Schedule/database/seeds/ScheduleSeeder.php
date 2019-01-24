<?php

use Illuminate\Database\Seeder;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Modules\Features\F/Schedule\Models\Schedule::truncate(); // TODO:
        \App\Modules\Features\F/Schedule\Models\Schedule::flushEventListeners();
        factory(\App\Modules\Features\F/Schedule\Models\Schedule::class, 15)->create();
    }
}
