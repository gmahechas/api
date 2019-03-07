<?php

namespace App\Modules\Features\F\ScheduleDayHourRange\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ScheduleDayHourRange extends Model
{
    use SoftDeletes;

    const CREATED_AT = 'schedule_day_hour_range_created_at';
	const UPDATED_AT = 'schedule_day_hour_range_updated_at';
    const DELETED_AT = 'schedule_day_hour_range_deleted_at';
    
    protected $table = 'f_schedule_day_hour_range';
	protected $primaryKey = 'schedule_day_hour_range_id';
	protected $fillable = [
		'schedule_day_hour_range_status',
		'schedule_day_id',
		'hour_range_id'
	];

	protected $dates = [
		'schedule_day_hour_range_created_at',
		'schedule_day_hour_range_updated_at',
		'schedule_day_hour_range_deleted_at'
	];
	
	/*In*/
	public function schedule_day(){
		return $this->belongsTo(\App\Modules\Features\F\ScheduleDay\Models\ScheduleDay::class, 'schedule_day_id');
	}
	public function hour_range(){
		return $this->belongsTo(\App\Modules\Features\F\HourRange\Models\HourRange::class, 'hour_range_id');		
	}
}