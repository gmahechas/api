<?php

namespace App\Modules\Features\C\Employee\GraphQL\Type;

use GraphQL;
use App\Modules\Shared\GraphQL\Field\DateField;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class EmployeeType extends GraphQLType
{
    protected $attributes = [
        'name' => 'EmployeeType',
        'model' => \App\Modules\Features\C\Employee\Models\Employee::class
    ];

    public function fields()
    {
        return [
            'employee_id' => [
            	'type' => Type::id()
            ],
            'employee_gender' => [
            	'type' => Type::string()
            ],
            'employee_birth_date' => [
            	'type' => Type::string()
            ],
            'employee_hire_date' => [
            	'type' => Type::string()
            ],
            'employee_business_mail' => [
            	'type' => Type::string()
            ],
            /*In*/
            'person_id' => [
            	'type' => Type::id()
            ],
            'person' => [
                'type' => GraphQL::type('Person')
            ],
            'city_birth_id' => [
            	'type' => Type::id()
            ],
            'city_birth' => [
                'type' => GraphQL::type('City')
            ],
            'employee_created_at' => DateField::class,
            'employee_updated_at' => DateField::class,
            'employee_deleted_at' => DateField::class,
        ];
    }
}