<?php

use Illuminate\Database\Seeder;
use App\Models\Modules\Three\Macroproject;

class MacroprojectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Macroproject::truncate();
        Macroproject::flushEventListeners();
        factory(Macroproject::class, 5)->create();
    }
}
