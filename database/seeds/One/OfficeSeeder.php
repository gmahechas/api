<?php

use Illuminate\Database\Seeder;
use App\Modules\Features\B\Office\Models\Office;

class OfficeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Office::truncate();
        Office::flushEventListeners();
        factory(Office::class, 23)->create();
    }
}
