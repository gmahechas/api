<?php

use Illuminate\Database\Seeder;

class UserOfficeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Modules\Features\C\UserOffice\Models\UserOffice::truncate();
        \App\Modules\Features\C\UserOffice\Models\UserOffice::flushEventListeners();
        \App\Modules\Features\C\UserOffice\Models\UserOffice::create([
        	'user_office_status' => true,
        	'user_id' => 1,
        	'office_id' => 1
        ]);
        \App\Modules\Features\C\UserOffice\Models\UserOffice::create([
        	'user_office_status' => true,
        	'user_id' => 2,
        	'office_id' => 2
        ]);
        \App\Modules\Features\C\UserOffice\Models\UserOffice::create([
        	'user_office_status' => true,
        	'user_id' => 3,
        	'office_id' => 3
        ]);
    }
}
