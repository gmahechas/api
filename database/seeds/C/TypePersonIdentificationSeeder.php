<?php

use Illuminate\Database\Seeder;

class TypePersonIdentificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Modules\Features\C\TypePersonIdentification\Models\TypePersonIdentification::truncate();
        \App\Modules\Features\C\TypePersonIdentification\Models\TypePersonIdentification::flushEventListeners();
        \App\Modules\Features\C\TypePersonIdentification\Models\TypePersonIdentification::create([
        	'type_person_identification_code' => 'CC',
        	'type_person_identification_description' => 'CEDULA DE CIUDADANIA'
        ]);
        \App\Modules\Features\C\TypePersonIdentification\Models\TypePersonIdentification::create([
        	'type_person_identification_code' => 'NIT',
        	'type_person_identification_description' => 'NUMERO DE IDENTIFICACION TRIBUTARIA'
        ]);
    }
}
