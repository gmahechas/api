<?php

namespace App\GraphQL\Type\Three;

use GraphQL;
use App\GraphQL\Field\DateField;
use GraphQL\Type\Definition\Type;
use App\Models\Three\UserOfficeProject;
use Rebing\GraphQL\Support\Type as GraphQLType;

class UserOfficeProjectType extends GraphQLType
{
    protected $attributes = [
        'name' => 'UserOfficeProjectType',
        'model' => UserOfficeProject::class
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
            'user_office_project_created_at' => DateField::class,
            'user_office_project_updated_at' => DateField::class,
            'user_office_project_deleted_at' => DateField::class,
            'user_office_id' => [
                'type' => Type::id()
            ],
            'project_id' => [
                'type' => Type::id()
            ],
            /*In*/
            'user_office' => [
                'type' => GraphQL::type('UserOffice')
            ],
            'project' => [
                'type' => GraphQL::type('Project')
            ],
        ];
    }
}