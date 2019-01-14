<?php

namespace App\Modules\Features\C\Employee\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use SoftDeletes;

    const CREATED_AT = 'employee_created_at';
	const UPDATED_AT = 'employee_updated_at';
    const DELETED_AT = 'employee_deleted_at';
    
    protected $table = 'c_employee';
	protected $primaryKey = 'employee_id';
	protected $fillable = [
	   'employee_gender',
	   'employee_birth_date',
	   'employee_hire_date',
	   'employee_business_mail',
	   'person_id',
	   'city_birth_id',
	];

	protected $dates = [
		'employee_created_at',
		'employee_updated_at',
		'employee_deleted_at'
    ];
	
	/*In*/
	public function person(){
		return $this->belongsTo(\App\Modules\Features\C\Person\Models\Person::class, 'person_id');
	}

	public function city_birth(){
		return $this->belongsTo(\App\Modules\Features\A\City\Models\City::class, 'city_birth_id');
	}
}