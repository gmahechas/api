<?php

use Illuminate\Database\Seeder;

class DaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Modules\Features\F\Day\Models\Day::truncate();
        \App\Modules\Features\F\Day\Models\Day::flushEventListeners();
        \App\Modules\Features\F\Day\Models\Day::create([
        	'day_code' => 'lu',
        	'day_name' => 'lunes'
        ]);
        \App\Modules\Features\F\Day\Models\Day::create([
            'day_code' => 'ma',
            'day_name' => 'martes'
        ]);
        \App\Modules\Features\F\Day\Models\Day::create([
    	    'day_code' => 'mi',
        	'day_name' => 'miercoles'
        ]);
        \App\Modules\Features\F\Day\Models\Day::create([
            'day_code' => 'ju',
            'day_name' => 'jueves'
        ]);
        \App\Modules\Features\F\Day\Models\Day::create([
            'day_code' => 'vi',
            'day_name' => 'viernes'
        ]);
        \App\Modules\Features\F\Day\Models\Day::create([
            'day_code' => 'sa',
            'day_name' => 'sabado'
        ]);
        \App\Modules\Features\F\Day\Models\Day::create([
            'day_code' => 'do',
            'day_name' => 'domingo'
        ]);
    }
}
