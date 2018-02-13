<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		Schema::disableForeignKeyConstraints();
        /** One **/
        $this->call(CountrySeeder::class);
        Schema::enableForeignKeyConstraints();
    }
}
