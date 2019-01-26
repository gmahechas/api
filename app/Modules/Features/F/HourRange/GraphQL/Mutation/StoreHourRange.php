<?php

namespace App\Modules\Features\F\HourRange\GraphQL\Mutation;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;
use App\Modules\Features\F\HourRange\Models\HourRange;

class StoreHourRange extends Mutation
{
    protected $attributes = [
        'name' => 'StoreHourRange'
    ];

    public function type()
    {
        return GraphQL::type('HourRange');
    }

    public function args()
    {
        return [
            'hour_range_name' => [
                'type' => Type::string(),
                'rules' => ['required']
            ],
            'hour_range_description' => [
                'type' => Type::string(),
                'rules' => ['required']
            ],
            'hour_range_start' => [
                'type' => Type::string(),
                'rules' => ['required']
            ],
            'hour_range_end' => [
                'type' => Type::string(),
                'rules' => ['required']
            ],
        ];
    }

    public function resolve($root, $args, SelectFields $fields, ResolveInfo $info)
    {
        return HourRange::create($args);
    }
}