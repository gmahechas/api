<?php

namespace App\Models\Modules\Two;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use SoftDeletes;

    const CREATED_AT = 'menu_created_at';
	const UPDATED_AT = 'menu_updated_at';
	const DELETED_AT = 'menu_deleted_at';

	protected $table = 'two_menu';
	protected $primaryKey = 'menu_id';
	protected $fillable = [
		'menu_name',
		'menu_uri',
		'menu_id_parent'
	];

	protected $dates = [
		'menu_created_at',
		'menu_updated_at',
		'menu_deleted_at'
	];

	/*Out*/
	public function profile_menus(){
		return $this->hasMany(ProfileMenu::class, 'menu_id');
	}
}
