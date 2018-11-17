<?php

use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Project::truncate();
        Project::flushEventListeners();
        factory(\App\Modules\Features\D\Project\Models\Project::class, 10)->create();
    }
}
