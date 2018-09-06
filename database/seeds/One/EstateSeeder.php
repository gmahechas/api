<?php

use Illuminate\Database\Seeder;
use App\Models\One\Estate;

class EstateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Estate::truncate();
        Estate::flushEventListeners();
        factory(Estate::class, 30)->create();
    }
}
