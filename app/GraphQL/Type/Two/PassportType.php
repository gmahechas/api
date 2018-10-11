<?php

namespace App\GraphQL\Type\Two;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class PassportType extends GraphQLType
{
    protected $attributes = [
        'name' => 'PassportType',
    ];

    public function fields()
    {
        return [
            'token_type' => [
                'type' => Type::string()
            ],
            'expires_in' => [
                'type' => Type::id()
            ],
            'access_token' => [
                'type' => Type::string()
            ],
            'refresh_token' => [
                'type' => Type::string()
            ],
        ];
    }
}