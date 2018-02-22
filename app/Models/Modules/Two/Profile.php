<?php

namespace App\Models\Modules\Two;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model
{
    use SoftDeletes;

    const CREATED_AT = 'profile_created_at';
	const UPDATED_AT = 'profile_updated_at';
	const DELETED_AT = 'profile_deleted_at';

	protected $table = 'two_profile';
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
		return $this->hasMany(User::class, 'user_id');
	}
	
	public function profile_menus(){
		return $this->hasMany(ProfileMenu::class, 'profile_id');
	}
}
