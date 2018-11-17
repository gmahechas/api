<?php

use Illuminate\Database\Seeder;
use App\Modules\Features\D\UserOfficeProject\Models\UserOfficeProject;

class UserOfficeProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserOfficeProject::truncate();
        UserOfficeProject::flushEventListeners();
        UserOfficeProject::create([
        	'user_office_project_status' => true,
        	'user_office_id' => 1,
        	'project_id' => 1
        ]);
        UserOfficeProject::create([
        	'user_office_project_status' => true,
        	'user_office_id' => 1,
        	'project_id' => 2
        ]);
    }
}
