<?php

namespace App\Models\Two;

use App\Models\One\City;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Person extends Model
{
	use SoftDeletes;

    const CREATED_AT = 'person_created_at';
	const UPDATED_AT = 'person_updated_at';
	const DELETED_AT = 'person_deleted_at';

	protected $table = 'two_person';
	protected $primaryKey = 'person_id';
	protected $fillable = [
		'person_business_type',
		'person_identification_type',
		'person_identification',
		'person_first_name',
		'person_second_name',
		'person_first_surname',
		'person_second_surname',
		'person_legal_name',
		'city_id'
	];

	protected $dates = [
		'person_created_at',
		'person_updated_at',
		'person_deleted_at'
	];

	/*In*/
	public function city(){
		return $this->belongsTo(City::class, 'city_id');
	}

	/*Out*/
	public function user(){
		return $this->hasMany(User::class, 'person_id');
	}
}
