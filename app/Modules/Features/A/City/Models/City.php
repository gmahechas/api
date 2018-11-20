<?php

namespace App\Modules\Features\A\City\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
	use SoftDeletes;

    const CREATED_AT = 'city_created_at';
	const UPDATED_AT = 'city_updated_at';
	const DELETED_AT = 'city_deleted_at';

	protected $table = 'a_city';
	protected $primaryKey = 'city_id';
	protected $fillable = [
		'city_name',
		'city_code',
		'estate_id'
	];
	protected $dates = [
		'city_created_at',
		'city_updated_at',
		'city_deleted_at'
	];

	/*In*/
	public function estate(){
		return $this->belongsTo(\App\Modules\Features\A\Estate\Models\Estate::class, 'estate_id');
	}
	/*Out*/
	public function persons(){
		return $this->hasMany(\App\Modules\Features\C\Person\Models\Person::class, 'city_id');
	}
	public function offices(){
		return $this->hasMany(\App\Modules\Features\B\Office\Models\Office::class, 'city_id');
	}
}
