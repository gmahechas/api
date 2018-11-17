<?php

namespace App\Modules\Features\A\Country\GraphQL\Type;

use GraphQL;
use App\Modules\Shared\GraphQL\Field\DateField;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class CountryType extends GraphQLType
{
    protected $attributes = [
        'name' => 'CountryType',
        'model' => \App\Modules\Features\A\Country\Models\Country::class
    ];

    public function fields()
    {
        return [
            'country_id' => [
            	'type' => Type::id()
            ],
            'country_name' => [
            	'type' => Type::string()
            ],
            'country_code' => [
            	'type' => Type::string()
            ],
            'country_created_at' => DateField::class,
            'country_updated_at' => DateField::class,
            'country_deleted_at' => DateField::class,
            /*Out*/
            'estates' => [
                'type' => Type::listOf(GraphQL::type('Estate'))
            ],
        ];
    }
}