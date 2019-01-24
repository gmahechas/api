<?php

namespace App\Modules\Features\F\Schedule\GraphQL\Type;

use GraphQL;
use App\Modules\Shared\GraphQL\Field\DateField;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class ScheduleType extends GraphQLType
{
    protected $attributes = [
        'name' => 'ScheduleType',
        'model' => \App\Modules\Features\F\Schedule\Models\Schedule::class
    ];

    public function fields()
    {
        return [
            'schedule_id' => [
            	'type' => Type::id()
            ],
            'schedule_name' => [
            	'type' => Type::string()
            ],
            'schedule_created_at' => DateField::class,
            'schedule_updated_at' => DateField::class,
            'schedule_deleted_at' => DateField::class,
        ];
    }
}