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
        \App\Modules\Features\F\Schedule\Models\Schedule::truncate();
        \App\Modules\Features\F\Schedule\Models\Schedule::flushEventListeners();
        \App\Modules\Features\F\Schedule\Models\Schedule::create([
            'schedule_name' => 'Horario diurno',
        ]);
        \App\Modules\Features\F\Schedule\Models\Schedule::create([
            'schedule_name' => 'Horario nocturno',
        ]);
    }
}
