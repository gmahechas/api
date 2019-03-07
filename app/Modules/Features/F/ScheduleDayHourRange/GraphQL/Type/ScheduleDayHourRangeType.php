<?php

namespace App\Modules\Features\F\ScheduleDayHourRange\GraphQL\Type;

use GraphQL;
use App\Modules\Shared\GraphQL\Field\DateField;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class ScheduleDayHourRangeType extends GraphQLType
{
    protected $attributes = [
        'name' => 'ScheduleDayHourRangeType',
        'model' => \App\Modules\Features\F\ScheduleDayHourRange\Models\ScheduleDayHourRange::class
    ];

    public function fields()
    {
        return [
            'schedule_day_hour_range_id' => [
            	'type' => Type::id()
            ],
            'schedule_day_hour_range_status' => [
            	'type' => Type::boolean()
            ],
            /*In*/
            'schedule_day_id' => [
                'type' => Type::id()
            ],
            'schedule_day' => [
                'type' => GraphQL::type('ScheduleDay')
            ],
            'hour_range_id' => [
                'type' => Type::id()
            ],
            'hour_range' => [
                'type' => GraphQL::type('HourRange')
            ],
            'schedule_day_hour_range_created_at' => DateField::class,
            'schedule_day_hour_range_updated_at' => DateField::class,
            'schedule_day_hour_range_deleted_at' => DateField::class,
        ];
    }
}