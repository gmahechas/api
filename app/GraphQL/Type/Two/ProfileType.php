<?php

namespace App\GraphQL\Type\Two;

use GraphQL;
use App\GraphQL\Field\DateField;
use GraphQL\Type\Definition\Type;
use App\Models\Two\Profile;
use Rebing\GraphQL\Support\Type as GraphQLType;

class ProfileType extends GraphQLType
{
    protected $attributes = [
        'name' => 'ProfileType',
        'model' => Profile::class
    ];

    public function fields()
    {
        return [
            'profile_id' => [
            	'type' => Type::id()
            ],
            'profile_name' => [
            	'type' => Type::string()
            ],
            'profile_created_at' => DateField::class,
            'profile_updated_at' => DateField::class,
            'profile_deleted_at' => DateField::class,
            /*Out*/
            'users' => [
                'type' => Type::listOf(GraphQL::type('User'))
            ],
            'profile_menus' => [
                'type' => Type::listOf(GraphQL::type('ProfileMenu'))
            ],
        ];
    }
}