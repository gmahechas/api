<?php

use Illuminate\Database\Seeder;
use App\Models\One\Country;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Country::truncate();
        Country::flushEventListeners();
        factory(Country::class, 100)->create();
    }
}
