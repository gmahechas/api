<?php

use Illuminate\Database\Seeder;

class PersonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Modules\Features\C\Person\Models\Person::truncate();
        \App\Modules\Features\C\Person\Models\Person::flushEventListeners();
        factory(\App\Modules\Features\C\Person\Models\Person::class, 30)->create();
    }
}
