<?php

use Illuminate\Database\Seeder;
use App\Models\Modules\Two\Menu;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Menu::truncate();
        Menu::flushEventListeners();
        Menu::create([
        	'menu_name' => 'Modulo 1',
        	'menu_uri' => 'menu1',
        	'menu_id_parent' => null
        ]);
        Menu::create([
        	'menu_name' => 'Menu 1 - Modulo 1',
        	'menu_uri' => 'menu2',
        	'menu_id_parent' => 1
        ]);
        Menu::create([
        	'menu_name' => 'Menu 2 - Modulo 1',
        	'menu_uri' => 'menu3',
        	'menu_id_parent' => 1
        ]);
        Menu::create([
        	'menu_name' => 'Menu 3 - Modulo 1',
        	'menu_uri' => 'menu4',
        	'menu_id_parent' => 1
        ]);
        Menu::create([
        	'menu_name' => 'Modulo 2',
        	'menu_uri' => 'menu5',
        	'menu_id_parent' => null
        ]);
        Menu::create([
        	'menu_name' => 'Menu 4 - Modulo 2',
        	'menu_uri' => 'menu6',
        	'menu_id_parent' => 5
        ]);
        Menu::create([
        	'menu_name' => 'Menu 5 - Modulo 2',
        	'menu_uri' => 'menu7',
        	'menu_id_parent' => 5
        ]);
        Menu::create([
        	'menu_name' => 'Menu 6 - Modulo 2',
        	'menu_uri' => 'menu8',
        	'menu_id_parent' => 5
        ]);
    }
}
