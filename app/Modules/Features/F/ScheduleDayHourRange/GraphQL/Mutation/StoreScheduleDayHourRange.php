<?php

namespace App\Modules\Features\F\ScheduleDayHourRange\GraphQL\Mutation;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;
use App\Modules\Features\F\ScheduleDayHourRange\Models\ScheduleDayHourRange;

class StoreScheduleDayHourRange extends Mutation
{
    protected $attributes = [
        'name' => 'StoreScheduleDayHourRange'
    ];

    public function type()
    {
        return GraphQL::type('ScheduleDayHourRange');
    }

    public function args()
    {
        return [
            'schedule_day_hour_range_status' => [
                'type' => Type::boolean(),
                'rules' => ['required']
            ],
            'schedule_day_id' => [
                'type' => Type::id(),
                'rules' => ['required']
            ],
            'hour_range_id' => [
                'type' => Type::id(),
                'rules' => ['required']
            ],
        ];
    }

    public function resolve($root, $args, SelectFields $fields, ResolveInfo $info)
    {
        return ScheduleDayHourRange::create($args);
    }
}