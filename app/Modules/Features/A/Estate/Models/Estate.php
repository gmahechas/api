<?php

namespace App\Modules\Features\A\Estate\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Estate extends Model
{
    use SoftDeletes;

    const CREATED_AT = 'estate_created_at';
	const UPDATED_AT = 'estate_updated_at';
	const DELETED_AT = 'estate_deleted_at';

	protected $table = 'a_estate';
	protected $primaryKey = 'estate_id';
	protected $fillable = [
		'estate_name',
		'estate_code',
		'country_id'
	];
	protected $dates = [
		'estate_created_at',
		'estate_updated_at',
		'estate_deleted_at'
	];

	/*In*/
	public function country(){
		return $this->belongsTo(\App\Modules\Features\A\Country\Models\Country::class, 'country_id');
	}
	
	/*Out*/
	public function cities(){
		return $this->hasMany(\App\Modules\Features\A\City\Models\City::class, 'estate_id');
	}
}
