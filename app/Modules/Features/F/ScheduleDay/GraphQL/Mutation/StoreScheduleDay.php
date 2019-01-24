<?php

namespace App\Modules\Features\F\ScheduleDay\GraphQL\Mutation;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;
use App\Modules\Features\F\ScheduleDay\Models\ScheduleDay;

class StoreScheduleDay extends Mutation
{
    protected $attributes = [
        'name' => 'StoreScheduleDay'
    ];

    public function type()
    {
        return GraphQL::type('ScheduleDay');
    }

    public function args()
    {
        return [
            'schedule_day_status' => [
                'type' => Type::boolean(),
                'rules' => ['required']
            ],
            'schedule_id' => [
                'type' => Type::id(),
                'rules' => ['required']
            ],
            'day_id' => [
                'type' => Type::id(),
                'rules' => ['required']
            ],
        ];
    }

    public function resolve($root, $args, SelectFields $fields, ResolveInfo $info)
    {
        return ScheduleDay::create($args);
    }
}