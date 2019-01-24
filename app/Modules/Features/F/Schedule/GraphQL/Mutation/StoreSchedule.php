<?php

namespace App\Modules\Features\F\Schedule\GraphQL\Mutation;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;
use App\Modules\Features\F\Schedule\Models\Schedule;

class StoreSchedule extends Mutation
{
    protected $attributes = [
        'name' => 'StoreSchedule'
    ];

    public function type()
    {
        return GraphQL::type('Schedule');
    }

    public function args()
    {
        return [
            'schedule_name' => [
                'type' => Type::string(),
                'rules' => ['required']
            ],
        ];
    }

    public function resolve($root, $args, SelectFields $fields, ResolveInfo $info)
    {
        return Schedule::create($args);
    }
}