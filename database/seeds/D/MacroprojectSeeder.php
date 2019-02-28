<?php

use Illuminate\Database\Seeder;

class MacroprojectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Modules\Features\D\Macroproject\Models\Macroproject::truncate();
        \App\Modules\Features\D\Macroproject\Models\Macroproject::flushEventListeners();
        \App\Modules\Features\D\Macroproject\Models\Macroproject::create([
            'macroproject_name' => 'Macroproyecto 1',
            'macroproject_address' => 'direccion',
            'macroproject_phone' => '77777',
            'city_id' => 1,
            'office_id' => 1
        ]);
        \App\Modules\Features\D\Macroproject\Models\Macroproject::create([
            'macroproject_name' => 'Macroproyecto 2',
            'macroproject_address' => 'direccion',
            'macroproject_phone' => '77777',
            'city_id' => 2,
            'office_id' => 2
        ]);
        \App\Modules\Features\D\Macroproject\Models\Macroproject::create([
            'macroproject_name' => 'Macroproyecto 3',
            'macroproject_address' => 'direccion',
            'macroproject_phone' => '77777',
            'city_id' => 3,
            'office_id' => 3
        ]);
    }
}
