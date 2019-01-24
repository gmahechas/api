<?php

namespace App\Modules\Features\F\ScheduleDay\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ScheduleDay extends Model
{
    use SoftDeletes;

    const CREATED_AT = 'schedule_day_created_at';
	const UPDATED_AT = 'schedule_day_updated_at';
    const DELETED_AT = 'schedule_day_deleted_at';
    
    protected $table = 'f_schedule_day';
	protected $primaryKey = 'schedule_day_id';
	protected $fillable = [
		'schedule_day_status',
		'schedule_id',
		'day_id'
	];

	protected $dates = [
		'schedule_day_created_at',
		'schedule_day_updated_at',
		'schedule_day_deleted_at'
    ];
	
	/*In*/
	public function schedule(){
		return $this->belongsTo(\App\Modules\Features\F\Schedule\Models\Schedule::class, 'schedule_id');
	}
	public function day(){
		return $this->belongsTo(\App\Modules\Features\F\Day\Models\Day::class, 'day_id');
	}
}