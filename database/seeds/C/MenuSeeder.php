<?php

use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Modules\Features\C\Menu\Models\Menu::truncate();
        \App\Modules\Features\C\Menu\Models\Menu::flushEventListeners();
        \App\Modules\Features\C\Menu\Models\Menu::create([
            'menu_name' => 'dashboard.singular',
            'menu_title_case' => 1,
            'menu_upper_case' => 0,
        	'menu_uri' => 'dashboard',
        	'menu_parent_id' => null
        ]);
        \App\Modules\Features\C\Menu\Models\Menu::create([
            'menu_name' => 'config.singular',
            'menu_title_case' => 0,
            'menu_upper_case' => 1,
        	'menu_uri' => null,
        	'menu_parent_id' => null
        ]);
        \App\Modules\Features\C\Menu\Models\Menu::create([
            'menu_name' => 'country.plural',
            'menu_title_case' => 1,
            'menu_upper_case' => 0,
        	'menu_uri' => 'country',
        	'menu_parent_id' => 2
        ]);
        \App\Modules\Features\C\Menu\Models\Menu::create([
            'menu_name' => 'estate.plural',
            'menu_title_case' => 1,
            'menu_upper_case' => 0,
        	'menu_uri' => 'estate',
        	'menu_parent_id' => 2
        ]);
        \App\Modules\Features\C\Menu\Models\Menu::create([
            'menu_name' => 'city.plural',
            'menu_title_case' => 1,
            'menu_upper_case' => 0,
        	'menu_uri' => 'city',
        	'menu_parent_id' => 2
        ]);
        \App\Modules\Features\C\Menu\Models\Menu::create([
            'menu_name' => 'company.singular',
            'menu_title_case' => 0,
            'menu_upper_case' => 1,
        	'menu_uri' => null,
        	'menu_parent_id' => 2
        ]);
            \App\Modules\Features\C\Menu\Models\Menu::create([
                'menu_name' => 'company.singular',
                'menu_title_case' => 1,
                'menu_upper_case' => 0,
                'menu_uri' => 'company',
                'menu_parent_id' => 6
            ]);
            \App\Modules\Features\C\Menu\Models\Menu::create([
                'menu_name' => 'office.plural',
                'menu_title_case' => 1,
                'menu_upper_case' => 0,
                'menu_uri' => 'office',
                'menu_parent_id' => 6
            ]);
            \App\Modules\Features\C\Menu\Models\Menu::create([
                'menu_name' => 'department.plural',
                'menu_title_case' => 1,
                'menu_upper_case' => 0,
                'menu_uri' => 'department',
                'menu_parent_id' => 6
            ]);
        \App\Modules\Features\C\Menu\Models\Menu::create([
            'menu_name' => 'type_person.plural',
            'menu_title_case' => 1,
            'menu_upper_case' => 0,
        	'menu_uri' => 'type_person',
        	'menu_parent_id' => 2
        ]);
        \App\Modules\Features\C\Menu\Models\Menu::create([
            'menu_name' => 'type_person_identification.plural',
            'menu_title_case' => 1,
            'menu_upper_case' => 0,
        	'menu_uri' => 'type_person_identification',
        	'menu_parent_id' => 2
        ]);
        \App\Modules\Features\C\Menu\Models\Menu::create([
            'menu_name' => 'person.plural',
            'menu_title_case' => 1,
            'menu_upper_case' => 0,
        	'menu_uri' => 'person',
        	'menu_parent_id' => 2
        ]);
        \App\Modules\Features\C\Menu\Models\Menu::create([
            'menu_name' => 'profile.plural',
            'menu_title_case' => 1,
            'menu_upper_case' => 0,
        	'menu_uri' => 'profile',
        	'menu_parent_id' => 2
        ]);
        \App\Modules\Features\C\Menu\Models\Menu::create([
            'menu_name' => 'user.plural',
            'menu_title_case' => 1,
            'menu_upper_case' => 0,
        	'menu_uri' => 'user',
        	'menu_parent_id' => 2
        ]);
        \App\Modules\Features\C\Menu\Models\Menu::create([
            'menu_name' => 'macroproject.plural',
            'menu_title_case' => 1,
            'menu_upper_case' => 0,
            'menu_uri' => 'macroproject',
            'menu_parent_id' => 2
        ]);
        \App\Modules\Features\C\Menu\Models\Menu::create([
            'menu_name' => 'project.plural',
            'menu_title_case' => 1,
            'menu_upper_case' => 0,
            'menu_uri' => 'project',
            'menu_parent_id' => 2
        ]);
        \App\Modules\Features\C\Menu\Models\Menu::create([
            'menu_name' => 'workflow.plural',
            'menu_title_case' => 0,
            'menu_upper_case' => 1,
            'menu_uri' => null,
            'menu_parent_id' => 2
        ]);
            \App\Modules\Features\C\Menu\Models\Menu::create([
                'menu_name' => 'workflow.plural',
                'menu_title_case' => 1,
                'menu_upper_case' => 0,
                'menu_uri' => 'workflow',
                'menu_parent_id' => 17
            ]);
        \App\Modules\Features\C\Menu\Models\Menu::create([
            'menu_name' => 'schedule.plural',
            'menu_title_case' => 0,
            'menu_upper_case' => 1,
            'menu_uri' => null,
            'menu_parent_id' => 2
        ]);
            \App\Modules\Features\C\Menu\Models\Menu::create([
                'menu_name' => 'day.plural',
                'menu_title_case' => 1,
                'menu_upper_case' => 0,
                'menu_uri' => 'day',
                'menu_parent_id' => 19
            ]);
            \App\Modules\Features\C\Menu\Models\Menu::create([
                'menu_name' => 'schedule.plural',
                'menu_title_case' => 1,
                'menu_upper_case' => 0,
                'menu_uri' => 'schedule',
                'menu_parent_id' => 19
            ]);
            \App\Modules\Features\C\Menu\Models\Menu::create([
                'menu_name' => 'hour_range.plural',
                'menu_title_case' => 1,
                'menu_upper_case' => 0,
                'menu_uri' => 'hour_range',
                'menu_parent_id' => 19
            ]);
    }
}
