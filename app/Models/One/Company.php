<?php

namespace App\Models\One;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use SoftDeletes;

    const CREATED_AT = 'company_created_at';
	const UPDATED_AT = 'company_updated_at';
	const DELETED_AT = 'company_deleted_at';

	protected $table = 'one_company';
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
		return $this->belongsTo(City::class, 'city_id');
	}

	/*Out*/
	public function offices(){
		return $this->hasMany(Office::class, 'company_id');
	}
}
