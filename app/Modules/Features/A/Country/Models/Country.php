<?php

namespace App\Modules\Features\A\Country\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model
{
    use SoftDeletes;

    const CREATED_AT = 'country_created_at';
	const UPDATED_AT = 'country_updated_at';
	const DELETED_AT = 'country_deleted_at';

	protected $table = 'a_country';
	protected $primaryKey = 'country_id';
	protected $fillable = [
		'country_name',
		'country_code'
	];
	protected $dates = [
		'country_created_at',
		'country_updated_at',
		'country_deleted_at'
	];

	/*Out*/
	public function estates(){
		return $this->hasMany(\App\Modules\Features\A\Estate\Models\Estate::class, 'country_id');
	}
}
