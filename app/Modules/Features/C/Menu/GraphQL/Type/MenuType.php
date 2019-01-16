<?php

namespace App\Modules\Features\C\Menu\GraphQL\Type;

use GraphQL;
use App\Modules\Shared\GraphQL\Field\DateField;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class MenuType extends GraphQLType
{
    protected $attributes = [
        'name' => 'MenuType',
        'model' => \App\Modules\Features\C\Menu\Models\Menu::class
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
            'menu_title_case' => [
            	'type' => Type::boolean()
            ],
            'menu_upper_case' => [
            	'type' => Type::boolean()
            ],
            'menu_uri' => [
            	'type' => Type::string()
            ],
            /*In*/
            'menu_parent_id' => [
                'type' => Type::id()
            ],
            'menu_parent' => [
                'type' => GraphQL::type('Menu')
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