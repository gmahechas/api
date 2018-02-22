<?php

use Illuminate\Database\Seeder;
use App\Models\Modules\One\Company;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Company::truncate();
        Company::flushEventListeners();
        factory(Company::class, 1)->create();
    }
}
