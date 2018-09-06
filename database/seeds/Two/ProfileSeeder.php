<?php

use Illuminate\Database\Seeder;
use App\Models\Two\Profile;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Profile::truncate();
        Profile::flushEventListeners();
        Profile::create([
        	'profile_name' => 'SOPORTE SISTEMA'
        ]);
        Profile::create([
        	'profile_name' => 'ACCESO TOTAL'
        ]);
    }
}
