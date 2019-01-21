<?php

use Illuminate\Database\Seeder;

class WorkflowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Modules\Features\E\Workflow\Models\Workflow::truncate();
        \App\Modules\Features\E\Workflow\Models\Workflow::flushEventListeners();
        \App\Modules\Features\E\Workflow\Models\Workflow::create([
        	'workflow_name' => 'WORKFLOW 1',
            'workflow_description' => 'WORKFLOW DESCRIPCION 1',
            'workflow_first_activities' => null,
            'workflow_edit_activities' => null,
            'workflow_latest_activities' => null
        ]);
    }
}
