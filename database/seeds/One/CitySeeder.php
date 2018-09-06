<?php

use Illuminate\Database\Seeder;
use App\Models\One\City;

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
        factory(City::class, 30)->create();
    }
}
