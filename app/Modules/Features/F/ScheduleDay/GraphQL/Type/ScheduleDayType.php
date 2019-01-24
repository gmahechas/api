<?php

namespace App\Modules\Features\F\ScheduleDay\GraphQL\Type;

use GraphQL;
use App\Modules\Shared\GraphQL\Field\DateField;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class ScheduleDayType extends GraphQLType
{
    protected $attributes = [
        'name' => 'ScheduleDayType',
        'model' => \App\Modules\Features\F\ScheduleDay\Models\ScheduleDay::class
    ];

    public function fields()
    {
        return [
            'schedule_day_id' => [
            	'type' => Type::id()
            ],
            'schedule_day_status' => [
            	'type' => Type::boolean()
            ],
            /*In*/
            'schedule_id' => [
                'type' => Type::id()
            ],
            'schedule' => [
                'type' => GraphQL::type('Schedule')
            ],
            'day_id' => [
                'type' => Type::id()
            ],
            'day' => [
                'type' => GraphQL::type('Day')
            ],
            'schedule_day_created_at' => DateField::class,
            'schedule_day_updated_at' => DateField::class,
            'schedule_day_deleted_at' => DateField::class,
        ];
    }
}