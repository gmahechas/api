<?php

namespace App\Models\Modules\One;

use App\Models\Modules\Two\Person;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
	use SoftDeletes;

    const CREATED_AT = 'city_created_at';
	const UPDATED_AT = 'city_updated_at';
	const DELETED_AT = 'city_deleted_at';

	protected $table = 'one_city';
	protected $primaryKey = 'city_id';
	protected $fillable = [
		'city_name',
		'city_code',
		'state_id'
	];
	protected $dates = [
		'city_created_at',
		'city_updated_at',
		'city_deleted_at'
	];

	/*In*/
	public function state(){
		return $this->belongsTo(State::class, 'state_id');
	}
	/*Out*/
	public function persons(){
		return $this->hasMany(Person::class, 'city_id');
	}
	public function offices(){
		return $this->hasMany(Office::class, 'city_id');
	}
}
