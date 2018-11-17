<?php

use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        City::truncate();
        City::flushEventListeners();
        factory(\App\Modules\Features\A\City\Models\City::class, 30)->create();
    }
}
