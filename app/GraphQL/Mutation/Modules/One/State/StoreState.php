<?php

namespace App\GraphQL\Mutation\Modules\One\State;

use GraphQL;
use App\Models\Modules\One\State;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;

class StoreState extends Mutation
{
    protected $attributes = [
        'name' => 'StoreState'
    ];

    public function type()
    {
        return GraphQL::type('State');
    }

    public function args()
    {
        return [
            'state_name' => [
                'type' => Type::string(),
                'rules' => ['required']
            ],
            'state_code' => [
                'type' => Type::string(),
                'rules' => ['required']
            ],
            'country_id' => [
                'type' => Type::id(),
                'rules' => ['required']
            ]
        ];
    }

    public function resolve($root, $args, SelectFields $fields, ResolveInfo $info)
    {
        return State::create($args);
    }
}