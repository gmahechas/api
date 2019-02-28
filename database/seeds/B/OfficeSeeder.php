<?php

use Illuminate\Database\Seeder;

class OfficeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Modules\Features\B\Office\Models\Office::truncate();
        \App\Modules\Features\B\Office\Models\Office::flushEventListeners();
        \App\Modules\Features\B\Office\Models\Office::create([
        	'office_name' => 'Sucursal 1',
        	'company_id' => 1,
        	'city_id' => 1
        ]);
        \App\Modules\Features\B\Office\Models\Office::create([
        	'office_name' => 'Sucursal 2',
        	'company_id' => 1,
        	'city_id' => 2
        ]);
        \App\Modules\Features\B\Office\Models\Office::create([
        	'office_name' => 'Sucursal 3',
        	'company_id' => 1,
        	'city_id' => 3
        ]);
    }
}
