<?php

namespace App\Modules\Features\D\UserOfficeProject\GraphQL\Type;

use GraphQL;
use App\Modules\Shared\GraphQL\Field\DateField;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class UserOfficeProjectType extends GraphQLType
{
    protected $attributes = [
        'name' => 'UserOfficeProjectType',
        'model' => \App\Modules\Features\D\UserOfficeProject\Models\UserOfficeProject::class
    ];

    public function fields()
    {
        return [
            'user_office_project_id' => [
            	'type' => Type::id()
            ],
            'user_office_project_status' => [
            	'type' => Type::boolean()
            ],
            /*In*/
            'user_office_id' => [
                'type' => Type::id()
            ],
            'user_office' => [
                'type' => GraphQL::type('UserOffice')
            ],
            'project_id' => [
                'type' => Type::id()
            ],
            'project' => [
                'type' => GraphQL::type('Project')
            ],
            'user_office_project_created_at' => DateField::class,
            'user_office_project_updated_at' => DateField::class,
            'user_office_project_deleted_at' => DateField::class,
        ];
    }
}