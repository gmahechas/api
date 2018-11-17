<?php

use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Modules\Features\C\Profile\Models\Profile::truncate();
        \App\Modules\Features\C\Profile\Models\Profile::flushEventListeners();
        \App\Modules\Features\C\Profile\Models\Profile::create([
        	'profile_name' => 'SOPORTE SISTEMA'
        ]);
        \App\Modules\Features\C\Profile\Models\Profile::create([
        	'profile_name' => 'ACCESO TOTAL'
        ]);
    }
}
