<?php

use Illuminate\Database\Seeder;

class ContextSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Modules\Features\E\Context\Models\Context::truncate();
        \App\Modules\Features\E\Context\Models\Context::flushEventListeners();
        \App\Modules\Features\E\Context\Models\Context::create([
        	'context_description' => 'CONTEXTO 1',
        	'menu_id' => 1
        ]);
        \App\Modules\Features\E\Context\Models\Context::create([
        	'context_description' => 'CONTEXTO 2',
        	'menu_id' => 1
        ]);
        \App\Modules\Features\E\Context\Models\Context::create([
        	'context_description' => 'CONTEXTO 3',
        	'menu_id' => 2
        ]);
        \App\Modules\Features\E\Context\Models\Context::create([
        	'context_description' => 'CONTEXTO 4',
        	'menu_id' => 2
        ]);
    }
}
