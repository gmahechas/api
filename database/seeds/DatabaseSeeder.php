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
        /** A **/
        $this->call(CountrySeeder::class);
        $this->call(EstateSeeder::class);
        $this->call(CitySeeder::class);
        /** B **/
        $this->call(CompanySeeder::class);
        $this->call(OfficeSeeder::class);
        $this->call(DepartmentSeeder::class);
        $this->call(OfficeDepartmentSeeder::class);
        /** C **/
        $this->call(ProfileSeeder::class);
        $this->call(MenuSeeder::class);
        $this->call(ProfileMenuSeeder::class);
        $this->call(TypePersonSeeder::class);
        $this->call(TypePersonIdentificationSeeder::class);
        $this->call(PersonSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(UserOfficeSeeder::class);
        $this->call(EmployeeSeeder::class);
        /** D **/
        $this->call(MacroprojectSeeder::class);
        $this->call(ProjectSeeder::class);
        $this->call(UserOfficeProjectSeeder::class);
        /** D **/
        $this->call(WorkflowSeeder::class);
        $this->call(ContextSeeder::class);
        $this->call(ContextVarSeeder::class);
        /** F **/
        $this->call(DaySeeder::class);
        $this->call(ScheduleSeeder::class);
        $this->call(ScheduleDaySeeder::class);
        $this->call(HourRangeSeeder::class);
        $this->call(ScheduleDayHourRangeSeeder::class);
        Schema::enableForeignKeyConstraints();
    }
}
