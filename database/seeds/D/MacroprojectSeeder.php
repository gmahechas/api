<?php

use Illuminate\Database\Seeder;

class MacroprojectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Modules\Features\D\Macroproject\Models\Macroproject::truncate();
        \App\Modules\Features\D\Macroproject\Models\Macroproject::flushEventListeners();
        factory(\App\Modules\Features\D\Macroproject\Models\Macroproject::class, 5)->create();
    }
}
