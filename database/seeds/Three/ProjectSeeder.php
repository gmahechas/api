<?php

use Illuminate\Database\Seeder;
use App\Models\Three\Project;

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
        factory(Project::class, 10)->create();
    }
}
