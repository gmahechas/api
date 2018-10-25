<?php

use Illuminate\Database\Seeder;
use App\Models\Two\Menu;

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
        	'menu_name' => 'Paises',
        	'menu_uri' => 'country',
        	'menu_parent_id' => null
        ]);
        Menu::create([
        	'menu_name' => 'Estados',
        	'menu_uri' => 'estate',
        	'menu_parent_id' => null
        ]);
        Menu::create([
        	'menu_name' => 'Ciudades',
        	'menu_uri' => 'city',
        	'menu_parent_id' => null
        ]);
        Menu::create([
        	'menu_name' => 'Sucursales',
        	'menu_uri' => 'office',
        	'menu_parent_id' => null
        ]);
        Menu::create([
        	'menu_name' => 'Empresa',
        	'menu_uri' => 'company',
        	'menu_parent_id' => null
        ]);
        Menu::create([
        	'menu_name' => 'Personas',
        	'menu_uri' => 'person',
        	'menu_parent_id' => null
        ]);
        Menu::create([
        	'menu_name' => 'Perfiles',
        	'menu_uri' => 'profile',
        	'menu_parent_id' => null
        ]);
        Menu::create([
        	'menu_name' => 'Usuarios',
        	'menu_uri' => 'user',
        	'menu_parent_id' => null
        ]);
        Menu::create([
            'menu_name' => 'Macro Proyecto',
            'menu_uri' => 'macroproject',
            'menu_parent_id' => null
        ]);
        Menu::create([
            'menu_name' => 'Proyecto',
            'menu_uri' => 'project',
            'menu_parent_id' => null
        ]);
    }
}
