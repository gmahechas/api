<?php

namespace App\Models\Two;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens, SoftDeletes;

    const CREATED_AT = 'user_created_at';
	const UPDATED_AT = 'user_updated_at';
	const DELETED_AT = 'user_deleted_at';

    protected $table = 'two_user';
	protected $primaryKey = 'user_id';
    protected $fillable = [
        'username',
        'email',
        'password',
        'person_id',
        'profile_id'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $dates = [
		'user_created_at',
		'user_updated_at',
		'user_deleted_at'
	];

    /*In*/
    public function person(){
        return $this->belongsTo(Person::class, 'person_id');
    }

    public function profile(){
        return $this->belongsTo(Profile::class, 'profile_id');
    }

    public function findForPassport($username) {
        return $this->where('username', $username)->first();
    }
}
