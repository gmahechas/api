<?php

namespace App\GraphQL\Type\Modules\One;

use GraphQL;
use App\GraphQL\Field\DateField;
use App\Models\One\City;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class CityType extends GraphQLType
{
    protected $attributes = [
        'name' => 'CityType',
        'model' => City::class
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
            'city_created_at' => DateField::class,
            'city_updated_at' => DateField::class,
            'city_deleted_at' => DateField::class,
            'estate_id' => [
                'type' => Type::id()
            ],
            /*In*/
            'estate' => [
                'type' => GraphQL::type('Estate')
            ],
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