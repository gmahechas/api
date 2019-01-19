<?php

namespace App\Modules\Features\C\User\GraphQL\Type;

use GraphQL;
use App\Modules\Shared\GraphQL\Field\DateField;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class UserType extends GraphQLType
{
    protected $attributes = [
        'name' => 'UserType',
        'model' => \App\Modules\Features\C\User\Models\User::class
    ];

    public function fields()
    {
        return [
            'user_id' => [
            	'type' => Type::id()
            ],
            'username' => [
            	'type' => Type::string()
            ],
            'password' => [
            	'type' => Type::string()
            ],
            /*In*/
            'person_id' => [
                'type' => Type::id()
            ],
            'person' => [
                'type' => GraphQL::type('Person')
            ],
            'profile_id' => [
                'type' => Type::id()
            ],
            'profile' => [
                'type' => GraphQL::type('Profile')
            ],
            'user_created_at' => DateField::class,
            'user_updated_at' => DateField::class,
            'user_deleted_at' => DateField::class
        ];
    }
}