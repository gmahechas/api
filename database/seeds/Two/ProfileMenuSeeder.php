<?php

use Illuminate\Database\Seeder;
use App\Models\Two\ProfileMenu;

class ProfileMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProfileMenu::truncate();
        ProfileMenu::flushEventListeners();
        ProfileMenu::create([
        	'profile_menu_status' => '1',
            'profile_id' => 1,
        	'menu_id' => 1
        ]);
        ProfileMenu::create([
            'profile_menu_status' => '1',
            'profile_id' => 1,
            'menu_id' => 2
        ]);
        ProfileMenu::create([
            'profile_menu_status' => '1',
            'profile_id' => 1,
            'menu_id' => 3
        ]);
        ProfileMenu::create([
            'profile_menu_status' => '1',
            'profile_id' => 1,
            'menu_id' => 4
        ]);
        ProfileMenu::create([
            'profile_menu_status' => '1',
            'profile_id' => 1,
            'menu_id' => 5
        ]);
        ProfileMenu::create([
            'profile_menu_status' => '1',
            'profile_id' => 1,
            'menu_id' => 6
        ]);
        ProfileMenu::create([
            'profile_menu_status' => '1',
            'profile_id' => 1,
            'menu_id' => 7
        ]);
        ProfileMenu::create([
            'profile_menu_status' => '1',
            'profile_id' => 1,
            'menu_id' => 8
        ]);
        ProfileMenu::create([
            'profile_menu_status' => '1',
            'profile_id' => 2,
            'menu_id' => 1
        ]);
        ProfileMenu::create([
            'profile_menu_status' => '1',
            'profile_id' => 2,
            'menu_id' => 2
        ]);
        ProfileMenu::create([
            'profile_menu_status' => '1',
            'profile_id' => 2,
            'menu_id' => 3
        ]);
        ProfileMenu::create([
            'profile_menu_status' => '1',
            'profile_id' => 2,
            'menu_id' => 4
        ]);
        ProfileMenu::create([
            'profile_menu_status' => '1',
            'profile_id' => 2,
            'menu_id' => 5
        ]);
        ProfileMenu::create([
            'profile_menu_status' => '1',
            'profile_id' => 2,
            'menu_id' => 6
        ]);
        ProfileMenu::create([
            'profile_menu_status' => '1',
            'profile_id' => 2,
            'menu_id' => 7
        ]);
        ProfileMenu::create([
            'profile_menu_status' => '1',
            'profile_id' => 2,
            'menu_id' => 8
        ]);
    }
}
