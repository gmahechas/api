<?php

use Illuminate\Database\Seeder;

class EstateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Modules\Features\A\Estate\Models\Estate::truncate();
        \App\Modules\Features\A\Estate\Models\Estate::flushEventListeners();
        factory(\App\Modules\Features\A\Estate\Models\Estate::class, 30)->create();
    }
}
