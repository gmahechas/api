<?php

use Illuminate\Database\Seeder;

class ProfileMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Modules\Features\C\ProfileMenu\Models\ProfileMenu::truncate();
        \App\Modules\Features\C\ProfileMenu\Models\ProfileMenu::flushEventListeners();
        \App\Modules\Features\C\ProfileMenu\Models\ProfileMenu::create([
        	'profile_menu_status' => true,
            'profile_id' => 1,
        	'menu_id' => 1
        ]);
        \App\Modules\Features\C\ProfileMenu\Models\ProfileMenu::create([
            'profile_menu_status' => true,
            'profile_id' => 1,
            'menu_id' => 2
        ]);
        \App\Modules\Features\C\ProfileMenu\Models\ProfileMenu::create([
            'profile_menu_status' => true,
            'profile_id' => 1,
            'menu_id' => 3
        ]);
        \App\Modules\Features\C\ProfileMenu\Models\ProfileMenu::create([
            'profile_menu_status' => true,
            'profile_id' => 1,
            'menu_id' => 4
        ]);
        \App\Modules\Features\C\ProfileMenu\Models\ProfileMenu::create([
            'profile_menu_status' => true,
            'profile_id' => 1,
            'menu_id' => 5
        ]);
        \App\Modules\Features\C\ProfileMenu\Models\ProfileMenu::create([
            'profile_menu_status' => true,
            'profile_id' => 1,
            'menu_id' => 6
        ]);
        \App\Modules\Features\C\ProfileMenu\Models\ProfileMenu::create([
            'profile_menu_status' => true,
            'profile_id' => 1,
            'menu_id' => 7
        ]);
        \App\Modules\Features\C\ProfileMenu\Models\ProfileMenu::create([
            'profile_menu_status' => true,
            'profile_id' => 1,
            'menu_id' => 8
        ]);
        \App\Modules\Features\C\ProfileMenu\Models\ProfileMenu::create([
            'profile_menu_status' => true,
            'profile_id' => 1,
            'menu_id' => 9
        ]);
        \App\Modules\Features\C\ProfileMenu\Models\ProfileMenu::create([
            'profile_menu_status' => true,
            'profile_id' => 1,
            'menu_id' => 10
        ]);
        \App\Modules\Features\C\ProfileMenu\Models\ProfileMenu::create([
            'profile_menu_status' => true,
            'profile_id' => 1,
            'menu_id' => 11
        ]);
        \App\Modules\Features\C\ProfileMenu\Models\ProfileMenu::create([
            'profile_menu_status' => true,
            'profile_id' => 1,
            'menu_id' => 12
        ]);
        \App\Modules\Features\C\ProfileMenu\Models\ProfileMenu::create([
            'profile_menu_status' => true,
            'profile_id' => 1,
            'menu_id' => 13
        ]);
        \App\Modules\Features\C\ProfileMenu\Models\ProfileMenu::create([
            'profile_menu_status' => true,
            'profile_id' => 1,
            'menu_id' => 14
        ]);
        \App\Modules\Features\C\ProfileMenu\Models\ProfileMenu::create([
            'profile_menu_status' => true,
            'profile_id' => 1,
            'menu_id' => 15
        ]);
        \App\Modules\Features\C\ProfileMenu\Models\ProfileMenu::create([
            'profile_menu_status' => true,
            'profile_id' => 1,
            'menu_id' => 16
        ]);
        \App\Modules\Features\C\ProfileMenu\Models\ProfileMenu::create([
            'profile_menu_status' => true,
            'profile_id' => 1,
            'menu_id' => 17
        ]);
        \App\Modules\Features\C\ProfileMenu\Models\ProfileMenu::create([
            'profile_menu_status' => true,
            'profile_id' => 1,
            'menu_id' => 18
        ]);
        \App\Modules\Features\C\ProfileMenu\Models\ProfileMenu::create([
            'profile_menu_status' => true,
            'profile_id' => 1,
            'menu_id' => 19
        ]);
        \App\Modules\Features\C\ProfileMenu\Models\ProfileMenu::create([
            'profile_menu_status' => true,
            'profile_id' => 1,
            'menu_id' => 20
        ]);
        \App\Modules\Features\C\ProfileMenu\Models\ProfileMenu::create([
            'profile_menu_status' => true,
            'profile_id' => 1,
            'menu_id' => 21
        ]);
        \App\Modules\Features\C\ProfileMenu\Models\ProfileMenu::create([
            'profile_menu_status' => true,
            'profile_id' => 1,
            'menu_id' => 22
        ]);
    }
}
