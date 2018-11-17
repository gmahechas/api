<?php

use Illuminate\Database\Seeder;
use App\Modules\Features\C\UserOffice\Models\UserOffice;

class UserOfficeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserOffice::truncate();
        UserOffice::flushEventListeners();
        UserOffice::create([
        	'user_office_status' => true,
        	'user_id' => 1,
        	'office_id' => 1
        ]);
        UserOffice::create([
        	'user_office_status' => true,
        	'user_id' => 1,
        	'office_id' => 2
        ]);
    }
}
