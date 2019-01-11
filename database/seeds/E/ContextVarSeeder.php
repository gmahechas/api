<?php

use Illuminate\Database\Seeder;

class ContextVarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Modules\Features\E\ContextVar\Models\ContextVar::truncate();
        \App\Modules\Features\E\ContextVar\Models\ContextVar::flushEventListeners();
        \App\Modules\Features\E\ContextVar\Models\ContextVar::create([
        	'context_var_code' => 'var_1',
            'context_var_type' => 'inactive',
            'context_var_description' => 'VARIABLE 1',
            'context_var_order' => 1,
            'context_id' => 1
        ]);
        \App\Modules\Features\E\ContextVar\Models\ContextVar::create([
        	'context_var_code' => 'var_2',
            'context_var_type' => 'inactive',
            'context_var_description' => 'VARIABLE 2',
            'context_var_order' => 1,
            'context_id' => 2
        ]);
        \App\Modules\Features\E\ContextVar\Models\ContextVar::create([
        	'context_var_code' => 'var_3',
            'context_var_type' => 'inactive',
            'context_var_description' => 'VARIABLE 3',
            'context_var_order' => 1,
            'context_id' => 3
        ]);
        \App\Modules\Features\E\ContextVar\Models\ContextVar::create([
        	'context_var_code' => 'var_4',
            'context_var_type' => 'inactive',
            'context_var_description' => 'VARIABLE 4',
            'context_var_order' => 1,
            'context_id' => 4
        ]);
    }
}
