<?php

use Illuminate\Database\Seeder;
use App\Modules\Features\A\Country\Models\Country;

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
