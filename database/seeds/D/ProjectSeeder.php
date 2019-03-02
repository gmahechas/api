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
        \App\Modules\Features\D\Project\Models\Project::create([
            'project_name' => 'Proyecto 1',
            'project_address' => 'direccion',
            'project_phone' => '7777',
            'macroproject_id' => 1
        ]);
        \App\Modules\Features\D\Project\Models\Project::create([
            'project_name' => 'Proyecto 2',
            'project_address' => 'direccion',
            'project_phone' => '7777',
            'macroproject_id' => 1
        ]);
        \App\Modules\Features\D\Project\Models\Project::create([
            'project_name' => 'Proyecto 3',
            'project_address' => 'direccion',
            'project_phone' => '7777',
            'macroproject_id' => 2
        ]);
        \App\Modules\Features\D\Project\Models\Project::create([
            'project_name' => 'Proyecto 4',
            'project_address' => 'direccion',
            'project_phone' => '7777',
            'macroproject_id' => 2
        ]);
        \App\Modules\Features\D\Project\Models\Project::create([
            'project_name' => 'Proyecto 5',
            'project_address' => 'direccion',
            'project_phone' => '7777',
            'macroproject_id' => 3
        ]);
        \App\Modules\Features\D\Project\Models\Project::create([
            'project_name' => 'Proyecto 6',
            'project_address' => 'direccion',
            'project_phone' => '7777',
            'macroproject_id' => 3
        ]);
    }
}
