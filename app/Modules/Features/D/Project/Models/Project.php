<?php

namespace App\Modules\Features\D\Project\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use SoftDeletes;

    const CREATED_AT = 'project_created_at';
	const UPDATED_AT = 'project_updated_at';
	const DELETED_AT = 'project_deleted_at';

	protected $table = 'd_project';
	protected $primaryKey = 'project_id';
	protected $fillable = [
		'project_name',
		'project_address',
		'project_phone',
		'macroproject_id'
	];

	protected $dates = [
		'project_created_at',
		'project_updated_at',
		'project_deleted_at'
	];

	/*In*/
	public function macroproject(){
		return $this->belongsTo(\App\Modules\Features\D\Macroproject\Models\Macroproject::class, 'macroproject_id');
	}
}
