<?php

namespace App\Modules\Features\A\City\GraphQL\Type;

use GraphQL;
use App\Modules\Shared\GraphQL\Field\DateField;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class CityType extends GraphQLType
{
    protected $attributes = [
        'name' => 'CityType',
        'model' => \App\Modules\Features\A\City\Models\City::class
    ];

    public function fields()
    {
        return [
            'city_id' => [
            	'type' => Type::id()
            ],
            'city_name' => [
            	'type' => Type::string()
            ],
            'city_code' => [
            	'type' => Type::string()
            ],
            /*In*/
            'estate_id' => [
                'type' => Type::id()
            ],
            'estate' => [
                'type' => GraphQL::type('Estate')
            ],
            'city_created_at' => DateField::class,
            'city_updated_at' => DateField::class,
            'city_deleted_at' => DateField::class,
            /*Out*/
            'persons' => [
                'type' => Type::listOf(GraphQL::type('Person'))
            ],
            'offices' => [
                'type' => Type::listOf(GraphQL::type('Office'))
            ],
        ];
    }
}