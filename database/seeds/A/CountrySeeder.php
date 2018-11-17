<?php

use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Modules\Features\A\Country\Models\Country::truncate();
        \App\Modules\Features\A\Country\Models\Country::flushEventListeners();
        factory(\App\Modules\Features\A\Country\Models\Country::class, 100)->create();
    }
}
