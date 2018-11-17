<?php

use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Modules\Features\B\Company\Models\Company::truncate();
        \App\Modules\Features\B\Company\Models\Company::flushEventListeners();
        factory(\App\Modules\Features\B\Company\Models\Company::class, 1)->create();
    }
}
