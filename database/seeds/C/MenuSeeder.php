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
        	'menu_uri' => 'dashboard',
        	'menu_parent_id' => null
        ]);
        \App\Modules\Features\C\Menu\Models\Menu::create([
        	'menu_name' => 'country.plural',
        	'menu_uri' => 'country',
        	'menu_parent_id' => null
        ]);
        \App\Modules\Features\C\Menu\Models\Menu::create([
        	'menu_name' => 'estate.plural',
        	'menu_uri' => 'estate',
        	'menu_parent_id' => null
        ]);
        \App\Modules\Features\C\Menu\Models\Menu::create([
        	'menu_name' => 'city.plural',
        	'menu_uri' => 'city',
        	'menu_parent_id' => null
        ]);
        \App\Modules\Features\C\Menu\Models\Menu::create([
        	'menu_name' => 'office.plural',
        	'menu_uri' => 'office',
        	'menu_parent_id' => null
        ]);
        \App\Modules\Features\C\Menu\Models\Menu::create([
        	'menu_name' => 'company.singular',
        	'menu_uri' => 'company',
        	'menu_parent_id' => null
        ]);
        \App\Modules\Features\C\Menu\Models\Menu::create([
        	'menu_name' => 'person.plural',
        	'menu_uri' => 'person',
        	'menu_parent_id' => null
        ]);
        \App\Modules\Features\C\Menu\Models\Menu::create([
        	'menu_name' => 'profile.plural',
        	'menu_uri' => 'profile',
        	'menu_parent_id' => null
        ]);
        \App\Modules\Features\C\Menu\Models\Menu::create([
        	'menu_name' => 'user.plural',
        	'menu_uri' => 'user',
        	'menu_parent_id' => null
        ]);
        \App\Modules\Features\C\Menu\Models\Menu::create([
            'menu_name' => 'macroproject.plural',
            'menu_uri' => 'macroproject',
            'menu_parent_id' => null
        ]);
        \App\Modules\Features\C\Menu\Models\Menu::create([
            'menu_name' => 'project.plural',
            'menu_uri' => 'project',
            'menu_parent_id' => null
        ]);
    }
}
