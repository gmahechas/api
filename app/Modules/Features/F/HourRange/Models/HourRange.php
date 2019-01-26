<?php

namespace App\Modules\Features\F\HourRange\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HourRange extends Model
{
    use SoftDeletes;

    const CREATED_AT = 'hour_range_created_at';
	const UPDATED_AT = 'hour_range_updated_at';
    const DELETED_AT = 'hour_range_deleted_at';
    
    protected $table = 'f_hour_range';
	protected $primaryKey = 'hour_range_id';
	protected $fillable = [
		'hour_range_name',
		'hour_range_description',
		'hour_range_start',
		'hour_range_end'
	];

	protected $dates = [
		'hour_range_created_at',
		'hour_range_updated_at',
		'hour_range_deleted_at'
    ];
    
}