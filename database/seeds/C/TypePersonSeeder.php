<?php

use Illuminate\Database\Seeder;

class TypePersonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Modules\Features\C\TypePerson\Models\TypePerson::truncate();
        \App\Modules\Features\C\TypePerson\Models\TypePerson::flushEventListeners();
        \App\Modules\Features\C\TypePerson\Models\TypePerson::create([
        	'type_person_code' => 'JUD',
        	'type_person_description' => 'PERSONA JURIDICA'
        ]);
        \App\Modules\Features\C\TypePerson\Models\TypePerson::create([
        	'type_person_code' => 'NAT',
        	'type_person_description' => 'PERSONA NATURAL'
        ]);
    }
}
