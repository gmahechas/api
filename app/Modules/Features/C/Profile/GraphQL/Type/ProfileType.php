<?php

namespace App\Modules\Features\C\Profile\GraphQL\Type;

use GraphQL;
use App\Modules\Shared\GraphQL\Field\DateField;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class ProfileType extends GraphQLType
{
    protected $attributes = [
        'name' => 'ProfileType',
        'model' => \App\Modules\Features\C\Profile\Models\Profile::class
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