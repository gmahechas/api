<?php

namespace App\Modules\Features\D\UserOfficeProject\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserOfficeProject extends Model
{
    use SoftDeletes;

    const CREATED_AT = 'user_office_project_created_at';
	const UPDATED_AT = 'user_office_project_updated_at';
	const DELETED_AT = 'user_office_project_deleted_at';

	protected $table = 'd_user_office_project';
	protected $primaryKey = 'user_office_project_id';
	protected $fillable = [
		'user_office_project_status',
		'user_office_id',
		'project_id'
	];

	protected $dates = [
		'user_office_project_created_at',
		'user_office_project_updated_at',
		'user_office_project_deleted_at'
	];

	/*In*/
	public function user_office(){
		return $this->belongsTo(\App\Modules\Features\C\UserOffice\Models\UserOffice::class, 'user_office_id');
	}

	public function project(){
		return $this->belongsTo(\App\Modules\Features\D\Project\Models\Project::class, 'project_id');
	}
}
