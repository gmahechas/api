<?php

namespace App\Modules\Features\D\Macroproject\GraphQL\Type;

use GraphQL;
use App\Modules\Shared\GraphQL\Field\DateField;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class MacroprojectType extends GraphQLType
{
    protected $attributes = [
        'name' => 'MacroprojectType',
        'model' => \App\Modules\Features\D\Macroproject\Models\Macroproject::class
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
            /*In*/
            'city_id' => [
                'type' => Type::id()
            ],
            'city' => [
                'type' => GraphQL::type('City')
            ],
            'office_id' => [
                'type' => Type::id()
            ],
            'office' => [
                'type' => GraphQL::type('Office')
            ],
            'macroproject_created_at' => DateField::class,
            'macroproject_updated_at' => DateField::class,
            'macroproject_deleted_at' => DateField::class,
        ];
    }
}