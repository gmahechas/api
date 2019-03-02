<?php

use Illuminate\Database\Seeder;

class UserOfficeProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Modules\Features\D\UserOfficeProject\Models\UserOfficeProject::truncate();
        \App\Modules\Features\D\UserOfficeProject\Models\UserOfficeProject::flushEventListeners();
        \App\Modules\Features\D\UserOfficeProject\Models\UserOfficeProject::create([
        	'user_office_project_status' => true,
        	'user_office_id' => 1,
        	'project_id' => 1
        ]);
        \App\Modules\Features\D\UserOfficeProject\Models\UserOfficeProject::create([
        	'user_office_project_status' => true,
        	'user_office_id' => 2,
        	'project_id' => 3
        ]);
        \App\Modules\Features\D\UserOfficeProject\Models\UserOfficeProject::create([
        	'user_office_project_status' => true,
        	'user_office_id' => 3,
        	'project_id' => 5
        ]);
    }
}
