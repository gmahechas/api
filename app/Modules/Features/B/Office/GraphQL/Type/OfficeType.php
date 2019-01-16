<?php

namespace App\Modules\Features\B\Office\GraphQL\Type;

use GraphQL;
use App\Modules\Shared\GraphQL\Field\DateField;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class OfficeType extends GraphQLType
{
    protected $attributes = [
        'name' => 'OfficeType',
        'model' => \App\Modules\Features\B\Office\Models\Office::class
    ];

    public function fields()
    {
        return [
            'office_id' => [
            	'type' => Type::id()
            ],
            'office_name' => [
            	'type' => Type::string()
            ],
            /*In*/
            'company_id' => [
                'type' => Type::id()
            ],
            'company' => [
                'type' => GraphQL::type('Company')
            ],
            'city_id' => [
                'type' => Type::id()
            ],
            'city' => [
                'type' => GraphQL::type('City')
            ],
            'office_created_at' => DateField::class,
            'office_updated_at' => DateField::class,
            'office_deleted_at' => DateField::class,
        ];
    }
}