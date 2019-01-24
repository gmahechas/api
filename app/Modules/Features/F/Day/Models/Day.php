<?php

namespace App\Modules\Features\F\Day\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Day extends Model
{
    use SoftDeletes;

    const CREATED_AT = 'day_created_at';
	const UPDATED_AT = 'day_updated_at';
    const DELETED_AT = 'day_deleted_at';
    
    protected $table = 'f_day';
	protected $primaryKey = 'day_id';
	protected $fillable = [
		'day_code',
		'day_name'
	];

	protected $dates = [
		'day_created_at',
		'day_updated_at',
		'day_deleted_at'
    ];
    
}