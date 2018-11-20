<?php

namespace App\Modules\Features\B\Company\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use SoftDeletes;

    const CREATED_AT = 'company_created_at';
	const UPDATED_AT = 'company_updated_at';
	const DELETED_AT = 'company_deleted_at';

	protected $table = 'b_company';
	protected $primaryKey = 'company_id';
	protected $fillable = [
		'company_name',
		'company_identification',
		'city_id'
	];
	protected $dates = [
		'company_created_at',
		'company_updated_at',
		'company_deleted_at'
	];

	/*In*/
	public function city(){
		return $this->belongsTo(\App\Modules\Features\A\City\Models\City::class, 'city_id');
	}

	/*Out*/
	public function offices(){
		return $this->hasMany(\App\Modules\Features\B\Office\Models\Office::class, 'company_id');
	}
}
