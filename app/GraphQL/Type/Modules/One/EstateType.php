<?php

namespace App\GraphQL\Type\Modules\One;

use GraphQL;
use App\GraphQL\Field\DateField;
use App\Models\One\Estate;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class EstateType extends GraphQLType
{
    protected $attributes = [
        'name' => 'EstateType',
        'model' => Estate::class
    ];

    public function fields()
    {
        return [
            'estate_id' => [
            	'type' => Type::id()
            ],
            'estate_name' => [
            	'type' => Type::string()
            ],
            'estate_code' => [
            	'type' => Type::string()
            ],
            'estate_created_at' => DateField::class,
            'estate_updated_at' => DateField::class,
            'estate_deleted_at' => DateField::class,
            'country_id' => [
                'type' => Type::id()
            ],
            /*In*/
            'country' => [
                'type' => GraphQL::type('Country')
            ],
            /*Out*/
            'cities' => [
                'type' => Type::listOf(GraphQL::type('City'))
            ],
        ];
    }
}