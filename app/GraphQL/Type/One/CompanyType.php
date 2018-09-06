<?php

namespace App\GraphQL\Type\One;

use GraphQL;
use App\GraphQL\Field\DateField;
use GraphQL\Type\Definition\Type;
use App\Models\One\Company;
use Rebing\GraphQL\Support\Type as GraphQLType;

class CompanyType extends GraphQLType
{
    protected $attributes = [
        'name' => 'CompanyType',
        'model' => Company::class
    ];

    public function fields()
    {
        return [
            'company_id' => [
            	'type' => Type::id()
            ],
            'company_name' => [
            	'type' => Type::string()
            ],
            'company_identification' => [
            	'type' => Type::string()
            ],
            'company_created_at' => DateField::class,
            'company_updated_at' => DateField::class,
            'company_deleted_at' => DateField::class,
            'city_id' => [
                'type' => Type::id()
            ],
			/*In*/
            'city' => [
                'type' => GraphQL::type('City')
            ],
            /*Out*/
            'offices' => [
                'type' => Type::listOf(GraphQL::type('Office'))
            ],
        ];
    }
}