<?php

namespace App\Modules\Features\B\Department\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use SoftDeletes;

    const CREATED_AT = 'department_created_at';
	const UPDATED_AT = 'department_updated_at';
    const DELETED_AT = 'department_deleted_at';
    
    protected $table = 'b_department';
	protected $primaryKey = 'department_id';
	protected $fillable = [
		'department_name',
		'department_description'
	];

	protected $dates = [
		'department_created_at',
		'department_updated_at',
		'department_deleted_at'
    ];
    
}