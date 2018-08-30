<?php

use Illuminate\Database\Seeder;
use App\Models\Modules\One\Office;

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
