<?php

namespace App\Modules\Features\B\Office\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Office extends Model
{
    use SoftDeletes;

    const CREATED_AT = 'office_created_at';
	const UPDATED_AT = 'office_updated_at';
	const DELETED_AT = 'office_deleted_at';

	protected $table = 'b_office';
	protected $primaryKey = 'office_id';
	protected $fillable = [
		'office_name',
		'company_id',
		'city_id'
	];
	protected $dates = [
		'office_created_at',
		'office_updated_at',
		'office_deleted_at'
	];

	/*In*/
	public function company(){
		return $this->belongsTo(\App\Modules\Features\B\Company\Models\Company::class, 'company_id');
	}
	public function city(){
		return $this->belongsTo(\App\Modules\Features\A\City\Models\City::class, 'city_id');
	}
}
