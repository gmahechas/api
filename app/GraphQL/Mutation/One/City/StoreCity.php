<?php

namespace App\GraphQL\Mutation\One\City;

use GraphQL;
use App\Models\One\City;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;

class StoreCity extends Mutation
{
    protected $attributes = [
        'name' => 'StoreCity'
    ];

    public function type()
    {
        return GraphQL::type('City');
    }

    public function args()
    {
        return [
            'city_name' => [
                'type' => Type::string(),
                'rules' => ['required']
            ],
            'city_code' => [
                'type' => Type::string(),
                'rules' => ['required']
            ],
            'estate_id' => [
                'type' => Type::id(),
                'rules' => ['required']
            ]
        ];
    }

    public function resolve($root, $args, SelectFields $fields, ResolveInfo $info)
    {
        return City::create($args);
    }
}