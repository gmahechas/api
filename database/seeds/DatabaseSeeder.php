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
        $this->call(EstateSeeder::class);
        $this->call(CitySeeder::class);
        $this->call(CompanySeeder::class);
        $this->call(OfficeSeeder::class);
        /** Two **/
        $this->call(ProfileSeeder::class);
        $this->call(MenuSeeder::class);
        $this->call(ProfileMenuSeeder::class);
        $this->call(PersonSeeder::class);
        $this->call(UserSeeder::class);
        /** Three **/
        $this->call(MacroprojectSeeder::class);
        Schema::enableForeignKeyConstraints();
    }
}
