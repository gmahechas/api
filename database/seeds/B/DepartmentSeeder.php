<?php

use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Modules\Features\B\Department\Models\Department::truncate();
        \App\Modules\Features\B\Department\Models\Department::flushEventListeners();
        factory(\App\Modules\Features\B\Department\Models\Department::class, 15)->create();
    }
}
