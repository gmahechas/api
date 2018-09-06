<?php

namespace App\Models\One;

use App\Models\Two\Person;
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
		'estate_id'
	];
	protected $dates = [
		'city_created_at',
		'city_updated_at',
		'city_deleted_at'
	];

	/*In*/
	public function estate(){
		return $this->belongsTo(Estate::class, 'estate_id');
	}
	/*Out*/
	public function persons(){
		return $this->hasMany(Person::class, 'city_id');
	}
	public function offices(){
		return $this->hasMany(Office::class, 'city_id');
	}
}
