<?php

namespace App\Modules\Features\D\Macroproject\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Macroproject extends Model
{
    use SoftDeletes;

    const CREATED_AT = 'macroproject_created_at';
	const UPDATED_AT = 'macroproject_updated_at';
	const DELETED_AT = 'macroproject_deleted_at';

	protected $table = 'd_macroproject';
	protected $primaryKey = 'macroproject_id';
	protected $fillable = [
		'macroproject_name',
		'macroproject_address',
		'macroproject_phone',
		'city_id',
		'office_id'
	];

	protected $dates = [
		'macroproject_created_at',
		'macroproject_updated_at',
		'macroproject_deleted_at'
	];	

	/*In*/
	public function city(){
		return $this->belongsTo(\App\Modules\Features\A\City\Models\City::class, 'city_id');
	}

	public function office(){
		return $this->belongsTo(\App\Modules\Features\B\Office\Models\Office::class, 'office_id');
	}
}
