<?php

namespace App\Modules\Features\C\ProfileMenu\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProfileMenu extends Model
{
    use SoftDeletes;

    const CREATED_AT = 'profile_menu_created_at';
	const UPDATED_AT = 'profile_menu_updated_at';
	const DELETED_AT = 'profile_menu_deleted_at';

	protected $table = 'c_profile_menu';
	protected $primaryKey = 'profile_menu_id';
	protected $fillable = [
		'profile_menu_status',
		'profile_id',
		'menu_id'
	];

	protected $dates = [
		'profile_menu_created_at',
		'profile_menu_updated_at',
		'profile_menu_deleted_at'
	];

	/*In*/
	public function profile(){
		return $this->belongsTo(\App\Modules\Features\C\Profile\Models\Profile::class, 'profile_id');
	}
	
	public function menu(){
		return $this->belongsTo(\App\Modules\Features\C\Menu\Models\Menu::class, 'menu_id');
	}
}
