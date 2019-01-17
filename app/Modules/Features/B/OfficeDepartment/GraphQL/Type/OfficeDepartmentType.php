<?php

namespace App\Modules\Features\B\OfficeDepartment\GraphQL\Type;

use GraphQL;
use App\Modules\Shared\GraphQL\Field\DateField;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class OfficeDepartmentType extends GraphQLType
{
    protected $attributes = [
        'name' => 'OfficeDepartmentType',
        'model' => \App\Modules\Features\B\OfficeDepartment\Models\OfficeDepartment::class
    ];

    public function fields()
    {
        return [
            'office_department_id' => [
            	'type' => Type::id()
            ],
            'office_department_status' => [
            	'type' => Type::boolean()
            ],
            /*In*/
            'office_id' => [
                'type' => Type::id()
            ],
            'office' => [
                'type' => GraphQL::type('Office')
            ],
            'department_id' => [
                'type' => Type::id()
            ],
            'department' => [
                'type' => GraphQL::type('Department')
            ],
            'office_department_created_at' => DateField::class,
            'office_department_updated_at' => DateField::class,
            'office_department_deleted_at' => DateField::class,
        ];
    }
}