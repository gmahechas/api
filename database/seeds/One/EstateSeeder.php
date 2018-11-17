<?php

use Illuminate\Database\Seeder;
use App\Modules\Features\A\Estate\Models\Estate;

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
