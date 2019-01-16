<?php

namespace App\Modules\Features\C\ProfileMenu\GraphQL\Type;

use GraphQL;
use App\Modules\Shared\GraphQL\Field\DateField;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class ProfileMenuType extends GraphQLType
{
    protected $attributes = [
        'name' => 'ProfileMenuType',
        'model' => \App\Modules\Features\C\ProfileMenu\Models\ProfileMenu::class
    ];

    public function fields()
    {
        return [
            'profile_menu_id' => [
            	'type' => Type::id()
            ],
            'profile_menu_status' => [
            	'type' => Type::boolean()
            ],
            /*In*/
            'profile_id' => [
                'type' => Type::id()
            ],
            'profile' => [
                'type' => GraphQL::type('Profile')
            ],
            'menu_id' => [
                'type' => Type::id()
            ],
            'menu' => [
                'type' => GraphQL::type('Menu')
            ],
            'profile_menu_created_at' => DateField::class,
            'profile_menu_updated_at' => DateField::class,
            'profile_menu_deleted_at' => DateField::class,
        ];
    }
}