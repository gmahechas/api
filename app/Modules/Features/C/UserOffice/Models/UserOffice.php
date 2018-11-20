<?php

namespace App\Modules\Features\C\UserOffice\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserOffice extends Model
{
    use SoftDeletes;

    const CREATED_AT = 'user_office_created_at';
	const UPDATED_AT = 'user_office_updated_at';
	const DELETED_AT = 'user_office_deleted_at';

	protected $table = 'c_user_office';
	protected $primaryKey = 'user_office_id';
	protected $fillable = [
		'user_office_status',
		'user_id',
		'office_id'
	];

	protected $dates = [
		'user_office_created_at',
		'user_office_updated_at',
		'user_office_deleted_at'
	];

	/*In*/
	public function user(){
		return $this->belongsTo(\App\Modules\Features\C\User\Models\User::class, 'user_id');
	}

	public function office(){
		return $this->belongsTo(\App\Modules\Features\B\Office\Models\Office::class, 'office_id');
	}
}
