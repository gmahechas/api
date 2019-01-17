<?php

use Illuminate\Database\Seeder;

class OfficeDepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Modules\Features\B\OfficeDepartment\Models\OfficeDepartment::truncate();
        \App\Modules\Features\B\OfficeDepartment\Models\OfficeDepartment::flushEventListeners();
        \App\Modules\Features\B\OfficeDepartment\Models\OfficeDepartment::create([
        	'office_department_status' => true,
        	'office_id' => 1,
        	'department_id' => 1
        ]);
        \App\Modules\Features\B\OfficeDepartment\Models\OfficeDepartment::create([
        	'office_department_status' => true,
        	'office_id' => 1,
        	'department_id' => 2
        ]);
        \App\Modules\Features\B\OfficeDepartment\Models\OfficeDepartment::create([
        	'office_department_status' => true,
        	'office_id' => 2,
        	'department_id' => 3
        ]);
        \App\Modules\Features\B\OfficeDepartment\Models\OfficeDepartment::create([
        	'office_department_status' => true,
        	'office_id' => 2,
        	'department_id' => 4
        ]);
        \App\Modules\Features\B\OfficeDepartment\Models\OfficeDepartment::create([
        	'office_department_status' => true,
        	'office_id' => 3,
        	'department_id' => 1
        ]);
        \App\Modules\Features\B\OfficeDepartment\Models\OfficeDepartment::create([
        	'office_department_status' => true,
        	'office_id' => 3,
        	'department_id' => 2
        ]);
        \App\Modules\Features\B\OfficeDepartment\Models\OfficeDepartment::create([
        	'office_department_status' => true,
        	'office_id' => 3,
        	'department_id' => 3
        ]);
        \App\Modules\Features\B\OfficeDepartment\Models\OfficeDepartment::create([
        	'office_department_status' => true,
        	'office_id' => 3,
        	'department_id' => 4
        ]);
    }
}
