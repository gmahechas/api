<?php

namespace App\Modules\Features\C\Menu\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use SoftDeletes;

    const CREATED_AT = 'menu_created_at';
	const UPDATED_AT = 'menu_updated_at';
	const DELETED_AT = 'menu_deleted_at';

	protected $table = 'c_menu';
	protected $primaryKey = 'menu_id';
	protected $fillable = [
		'menu_name',
		'menu_title_case',
		'menu_upper_case',
		'menu_uri',
		'menu_parent_id'
	];

	protected $dates = [
		'menu_created_at',
		'menu_updated_at',
		'menu_deleted_at'
	];
	/*In*/
	public function menu_parent(){
		return $this->belongsTo(Menu::class, 'menu_parent_id');
	}

	/*Out*/
	public function profile_menus(){
		return $this->hasMany(\App\Modules\Features\C\ProfileMenu\Models\ProfileMenu::class, 'menu_id');
	}
}
