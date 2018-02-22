<?php

namespace App\Models\Modules\One;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class State extends Model
{
    use SoftDeletes;

    const CREATED_AT = 'state_created_at';
	const UPDATED_AT = 'state_updated_at';
	const DELETED_AT = 'state_deleted_at';

	protected $table = 'one_state';
	protected $primaryKey = 'state_id';
	protected $fillable = [
		'state_name',
		'state_code',
		'country_id'
	];
	protected $dates = [
		'state_created_at',
		'state_updated_at',
		'state_deleted_at'
	];

	/*In*/
	public function country(){
		return $this->belongsTo(Country::class, 'country_id');
	}
	
	/*Out*/
	public function cities(){
		return $this->hasMany(City::class, 'state_id');
	}
}
