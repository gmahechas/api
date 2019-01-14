<?php

use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Modules\Features\C\Employee\Models\Employee::truncate();
        \App\Modules\Features\C\Employee\Models\Employee::flushEventListeners();
        factory(\App\Modules\Features\C\Employee\Models\Employee::class, 5)->create();
    }
}
