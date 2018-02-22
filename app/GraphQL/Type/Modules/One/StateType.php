<?php

namespace App\GraphQL\Type\Modules\One;

use GraphQL;
use App\GraphQL\Field\DateField;
use App\Models\Modules\One\State;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class StateType extends GraphQLType
{
    protected $attributes = [
        'name' => 'StateType',
        'model' => State::class
    ];

    public function fields()
    {
        return [
            'state_id' => [
            	'type' => Type::id()
            ],
            'state_name' => [
            	'type' => Type::string()
            ],
            'state_code' => [
            	'type' => Type::string()
            ],
            'state_created_at' => DateField::class,
            'state_updated_at' => DateField::class,
            'state_deleted_at' => DateField::class,
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