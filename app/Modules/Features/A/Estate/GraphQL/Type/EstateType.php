<?php

namespace App\Modules\Features\A\Estate\GraphQL\Type;

use GraphQL;
use App\Modules\Shared\GraphQL\Field\DateField;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class EstateType extends GraphQLType
{
    protected $attributes = [
        'name' => 'EstateType',
        'model' => \App\Modules\Features\A\Estate\Models\Estate::class
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
            /*In*/
            'country_id' => [
                'type' => Type::id()
            ],
            'country' => [
                'type' => GraphQL::type('Country')
            ],
            'estate_created_at' => DateField::class,
            'estate_updated_at' => DateField::class,
            'estate_deleted_at' => DateField::class,
            /*Out*/
            'cities' => [
                'type' => Type::listOf(GraphQL::type('City'))
            ],
        ];
    }
}