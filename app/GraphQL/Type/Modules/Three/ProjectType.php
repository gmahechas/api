<?php

namespace App\GraphQL\Type\Modules\Three;

use GraphQL;
use App\GraphQL\Field\DateField;
use GraphQL\Type\Definition\Type;
use App\Models\Three\Project;
use Rebing\GraphQL\Support\Type as GraphQLType;

class ProjectType extends GraphQLType
{
    protected $attributes = [
        'name' => 'ProjectType',
        'model' => Project::class
    ];

    public function fields()
    {
        return [
            'project_id' => [
            	'type' => Type::id()
            ],
            'project_name' => [
            	'type' => Type::string()
            ],
            'project_address' => [
            	'type' => Type::string()
            ],
            'project_phone' => [
            	'type' => Type::string()
            ],
            'project_created_at' => DateField::class,
            'project_updated_at' => DateField::class,
            'project_deleted_at' => DateField::class,
            'macroproject_id' => [
                'type' => Type::id()
            ],
            /*In*/
            'macroproject' => [
                'type' => GraphQL::type('Macroproject')
            ],
        ];
    }
}