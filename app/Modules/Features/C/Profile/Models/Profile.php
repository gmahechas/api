<?php

namespace App\Modules\Features\C\Profile\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model
{
    use SoftDeletes;

    const CREATED_AT = 'profile_created_at';
	const UPDATED_AT = 'profile_updated_at';
	const DELETED_AT = 'profile_deleted_at';

	protected $table = 'c_profile';
	protected $primaryKey = 'profile_id';
	protected $fillable = [
		'profile_name'
	];

	protected $dates = [
		'profile_created_at',
		'profile_updated_at',
		'profile_deleted_at'
	];

	/*Out*/
	public function users(){
		return $this->hasMany(\App\Modules\Features\C\User\Models\User::class, 'user_id');
	}
	
	public function profile_menus(){
		return $this->hasMany(\App\Modules\Features\C\ProfileMenu\Models\ProfileMenu::class, 'profile_id');
	}
}
