<?php

namespace App\GraphQL\Type\Modules\Two;

use GraphQL;
use App\GraphQL\Field\DateField;
use GraphQL\Type\Definition\Type;
use App\Models\Modules\Two\ProfileMenu;
use Rebing\GraphQL\Support\Type as GraphQLType;

class ProfileMenuType extends GraphQLType
{
    protected $attributes = [
        'name' => 'ProfileMenuType',
        'model' => ProfileMenu::class
    ];

    public function fields()
    {
        return [
            'profile_menu_id' => [
            	'type' => Type::id()
            ],
            'profile_menu_status' => [
            	'type' => Type::string()
            ],
            'profile_menu_created_at' => DateField::class,
            'profile_menu_updated_at' => DateField::class,
            'profile_menu_deleted_at' => DateField::class,
         	'profile_id' => [
                'type' => Type::id()
            ],
         	'menu_id' => [
                'type' => Type::id()
            ],
            /*In*/
            'profile' => [
                'type' => GraphQL::type('Profile')
            ],
            'menu' => [
                'type' => GraphQL::type('Menu')
            ],
        ];
    }
}