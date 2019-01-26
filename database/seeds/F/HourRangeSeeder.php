<?php

use Illuminate\Database\Seeder;

class HourRangeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Modules\Features\F\HourRange\Models\HourRange::truncate();
        \App\Modules\Features\F\HourRange\Models\HourRange::flushEventListeners();
        \App\Modules\Features\F\HourRange\Models\HourRange::create([
            'hour_range_name' => 'mañana',
            'hour_range_description' => 'jornada mañana',
            'hour_range_start' => '07:00:00',
            'hour_range_end' => '13:00:00'
        ]);
        \App\Modules\Features\F\HourRange\Models\HourRange::create([
            'hour_range_name' => 'tarde',
            'hour_range_description' => 'jornada tarde',
            'hour_range_start' => '13:00:00',
            'hour_range_end' => '19:00:00'
        ]);
    }
}
