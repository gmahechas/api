<?php

namespace App\Modules\Features\B\Department\GraphQL\Type;

use GraphQL;
use App\Modules\Shared\GraphQL\Field\DateField;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class DepartmentType extends GraphQLType
{
    protected $attributes = [
        'name' => 'DepartmentType',
        'model' => \App\Modules\Features\B\Department\Models\Department::class
    ];

    public function fields()
    {
        return [
            'department_id' => [
            	'type' => Type::id()
            ],
            'department_name' => [
            	'type' => Type::string()
            ],
            'department_description' => [
            	'type' => Type::string()
            ],
            'department_created_at' => DateField::class,
            'department_updated_at' => DateField::class,
            'department_deleted_at' => DateField::class,
        ];
    }
}