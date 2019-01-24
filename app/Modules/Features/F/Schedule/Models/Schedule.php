<?php

namespace App\Modules\Features\F\Schedule\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Schedule extends Model
{
    use SoftDeletes;

    const CREATED_AT = 'schedule_created_at';
	const UPDATED_AT = 'schedule_updated_at';
    const DELETED_AT = 'schedule_deleted_at';
    
    protected $table = 'f_schedule';
	protected $primaryKey = 'schedule_id';
	protected $fillable = [
        'schedule_name'
	];

	protected $dates = [
		'schedule_created_at',
		'schedule_updated_at',
		'schedule_deleted_at'
    ];
    
}