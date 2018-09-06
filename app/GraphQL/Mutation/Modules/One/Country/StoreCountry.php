<?php

namespace App\GraphQL\Mutation\Modules\One\Country;

use GraphQL;
use GraphQL\Type\Definition\Type;
use App\Models\One\Country;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;

class StoreCountry extends Mutation
{
    protected $attributes = [
        'name' => 'StoreCountry'
    ];

    public function type()
    {
        return GraphQL::type('Country');
    }

    public function args()
    {
        return [
            'country_name' => [
                'type' => Type::string(),
                'rules' => ['required']
            ],
            'country_code' => [
                'type' => Type::string(),
                'rules' => ['required']
            ]
        ];
    }

    public function resolve($root, $args, SelectFields $fields, ResolveInfo $info)
    {
        return Country::create($args);
    }
}