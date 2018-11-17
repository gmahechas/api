<?php

use Illuminate\Database\Seeder;

class OfficeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Modules\Features\B\Office\Models\Office::truncate();
        \App\Modules\Features\B\Office\Models\Office::flushEventListeners();
        factory(\App\Modules\Features\B\Office\Models\Office::class, 23)->create();
    }
}
