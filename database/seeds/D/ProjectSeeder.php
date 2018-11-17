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
        \App\Modules\Features\D\Project\Models\Project::truncate();
        \App\Modules\Features\D\Project\Models\Project::flushEventListeners();
        factory(\App\Modules\Features\D\Project\Models\Project::class, 10)->create();
    }
}
