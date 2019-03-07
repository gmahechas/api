<?php

use Illuminate\Database\Seeder;

class ScheduleDayHourRangeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Modules\Features\F\ScheduleDayHourRange\Models\ScheduleDayHourRange::truncate();
        \App\Modules\Features\F\ScheduleDayHourRange\Models\ScheduleDayHourRange::flushEventListeners();
        \App\Modules\Features\F\ScheduleDayHourRange\Models\ScheduleDayHourRange::create([
            'schedule_day_hour_range_status' => 1,
            'schedule_day_id' => 1,
            'hour_range_id' => 1
        ]);
        \App\Modules\Features\F\ScheduleDayHourRange\Models\ScheduleDayHourRange::create([
            'schedule_day_hour_range_status' => 1,
            'schedule_day_id' => 1,
            'hour_range_id' => 2
        ]);
        \App\Modules\Features\F\ScheduleDayHourRange\Models\ScheduleDayHourRange::create([
            'schedule_day_hour_range_status' => 1,
            'schedule_day_id' => 2,
            'hour_range_id' => 2
        ]);
    }
}
