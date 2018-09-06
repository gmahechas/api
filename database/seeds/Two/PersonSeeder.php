<?php

use Illuminate\Database\Seeder;
use App\Models\Two\Person;

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
        factory(Person::class, 30)->create();
    }
}
