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
        Person::truncate();
        Person::flushEventListeners();
        factory(\App\Modules\Features\C\Person\Models\Person::class, 30)->create();
    }
}
