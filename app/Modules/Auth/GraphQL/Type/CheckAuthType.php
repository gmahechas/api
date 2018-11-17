<?php

namespace App\Modules\Auth\GraphQL\Type;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class CheckAuthType extends GraphQLType
{
    protected $attributes = [
        'name' => 'CheckAuthType'
    ];

    public function fields()
    {
        return [
            'user' => [
                'type' => GraphQL::type('User')
            ],
            'company' => [
                'type' => GraphQL::type('Company')
            ],
        ];
    }
}