<?php

use Illuminate\Database\Seeder;

class ScheduleDaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Modules\Features\F\ScheduleDay\Models\ScheduleDay::truncate();
        \App\Modules\Features\F\ScheduleDay\Models\ScheduleDay::flushEventListeners();
        \App\Modules\Features\F\ScheduleDay\Models\ScheduleDay::create([
            'schedule_day_status' => 1,
            'schedule_id' => 1,
            'day_id' => 1
        ]);
        \App\Modules\Features\F\ScheduleDay\Models\ScheduleDay::create([
            'schedule_day_status' => 1,
            'schedule_id' => 1,
            'day_id' => 2
        ]);
        \App\Modules\Features\F\ScheduleDay\Models\ScheduleDay::create([
            'schedule_day_status' => 1,
            'schedule_id' => 1,
            'day_id' => 3
        ]);
        \App\Modules\Features\F\ScheduleDay\Models\ScheduleDay::create([
            'schedule_day_status' => 1,
            'schedule_id' => 1,
            'day_id' => 4
        ]);
        \App\Modules\Features\F\ScheduleDay\Models\ScheduleDay::create([
            'schedule_day_status' => 1,
            'schedule_id' => 1,
            'day_id' => 5
        ]);
        \App\Modules\Features\F\ScheduleDay\Models\ScheduleDay::create([
            'schedule_day_status' => 1,
            'schedule_id' => 1,
            'day_id' => 6
        ]);
        \App\Modules\Features\F\ScheduleDay\Models\ScheduleDay::create([
            'schedule_day_status' => 1,
            'schedule_id' => 1,
            'day_id' => 7
        ]);
        \App\Modules\Features\F\ScheduleDay\Models\ScheduleDay::create([
            'schedule_day_status' => 1,
            'schedule_id' => 2,
            'day_id' => 1
        ]);
    }
}
