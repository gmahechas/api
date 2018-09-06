<?php

namespace App\GraphQL\Type\Three;

use GraphQL;
use App\GraphQL\Field\DateField;
use GraphQL\Type\Definition\Type;
use App\Models\Three\Macroproject;
use Rebing\GraphQL\Support\Type as GraphQLType;

class MacroprojectType extends GraphQLType
{
    protected $attributes = [
        'name' => 'MacroprojectType',
        'model' => Macroproject::class
    ];

    public function fields()
    {
        return [
            'macroproject_id' => [
            	'type' => Type::id()
            ],
            'macroproject_name' => [
            	'type' => Type::string()
            ],
            'macroproject_address' => [
            	'type' => Type::string()
            ],
            'macroproject_phone' => [
            	'type' => Type::string()
            ],
            'macroproject_created_at' => DateField::class,
            'macroproject_updated_at' => DateField::class,
            'macroproject_deleted_at' => DateField::class,
            'city_id' => [
                'type' => Type::id()
            ],
            'office_id' => [
                'type' => Type::id()
            ],
            /*In*/
            'city' => [
                'type' => GraphQL::type('City')
            ],
            'office' => [
                'type' => GraphQL::type('Office')
            ],
        ];
    }
}