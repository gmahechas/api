<?php

namespace App\GraphQL\Type\Modules\One;

use GraphQL;
use App\GraphQL\Field\DateField;
use GraphQL\Type\Definition\Type;
use App\Models\Modules\One\Country;
use Rebing\GraphQL\Support\Type as GraphQLType;

class CountryType extends GraphQLType
{
    protected $attributes = [
        'name' => 'CountryType',
        'model' => Country::class
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