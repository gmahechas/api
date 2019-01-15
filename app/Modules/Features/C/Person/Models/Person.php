<?php

namespace App\Modules\Features\C\Person\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Person extends Model
{
	use SoftDeletes;

    const CREATED_AT = 'person_created_at';
	const UPDATED_AT = 'person_updated_at';
	const DELETED_AT = 'person_deleted_at';

	protected $table = 'c_person';
	protected $primaryKey = 'person_id';
	protected $fillable = [
		'person_identification',
		'person_identification_date_issue',
		'person_first_name',
		'person_second_name',
		'person_first_surname',
		'person_second_surname',
		'person_legal_name',
		'person_address',
		'person_email',
		'person_phone',
		'type_person_id',
		'type_person_identification_id',
		'city_issue_id',
		'city_location_id'
	];

	protected $dates = [
		'person_created_at',
		'person_updated_at',
		'person_deleted_at'
	];

	/*In*/
	public function type_person(){
		return $this->belongsTo(\App\Modules\Features\C\TypePerson\Models\TypePerson::class, 'type_person_id');
	}
	public function type_person_identification(){
		return $this->belongsTo(\App\Modules\Features\C\TypePersonIdentification\Models\TypePersonIdentification::class, 'type_person_identification_id');
	}
	public function city_issue(){
		return $this->belongsTo(\App\Modules\Features\A\City\Models\City::class, 'city_issue_id');
	}
	public function city_location(){
		return $this->belongsTo(\App\Modules\Features\A\City\Models\City::class, 'city_location_id');
	}
	/*Out*/
	public function user(){
		return $this->hasOne(\App\Modules\Features\C\User\Models\User::class, 'person_id');
	}
}
