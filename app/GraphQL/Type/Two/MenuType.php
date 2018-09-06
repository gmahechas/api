<?php

namespace App\GraphQL\Type\Two;

use GraphQL;
use App\GraphQL\Field\DateField;
use App\Models\Two\Menu;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class MenuType extends GraphQLType
{
    protected $attributes = [
        'name' => 'MenuType',
        'model' => Menu::class
    ];

    public function fields()
    {
        return [
            'menu_id' => [
            	'type' => Type::id()
            ],
            'menu_name' => [
            	'type' => Type::string()
            ],
            'menu_uri' => [
            	'type' => Type::string()
            ],
            'menu_created_at' => DateField::class,
            'menu_updated_at' => DateField::class,
            'menu_deleted_at' => DateField::class,
            /*Out*/
            'profile_menus' => [
                'type' => GraphQL::type('ProfileMenu')
            ],
        ];
    }
}