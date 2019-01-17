<?php

namespace App\Modules\Features\B\OfficeDepartment\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OfficeDepartment extends Model
{
    use SoftDeletes;

    const CREATED_AT = 'office_department_created_at';
	const UPDATED_AT = 'office_department_updated_at';
    const DELETED_AT = 'office_department_deleted_at';
    
    protected $table = 'b_office_department';
	protected $primaryKey = 'office_department_id';
	protected $fillable = [
		'office_department_status',
		'office_id',
		'department_id'
	];

	protected $dates = [
		'office_department_created_at',
		'office_department_updated_at',
		'office_department_deleted_at'
    ];
	
	/*In*/
	public function office(){
		return $this->belongsTo(\App\Modules\Features\B\Office\Models\Office::class, 'office_id');
	}
	public function department(){
		return $this->belongsTo(\App\Modules\Features\B\Department\Models\Department::class, 'department_id');
	}
}