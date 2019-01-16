<?php

namespace App\Modules\Features\D\Project\GraphQL\Type;

use GraphQL;
use App\Modules\Shared\GraphQL\Field\DateField;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class ProjectType extends GraphQLType
{
    protected $attributes = [
        'name' => 'ProjectType',
        'model' => \App\Modules\Features\D\Project\Models\Project::class
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
            /*In*/
            'macroproject_id' => [
                'type' => Type::id()
            ],
            'macroproject' => [
                'type' => GraphQL::type('Macroproject')
            ],
            'project_created_at' => DateField::class,
            'project_updated_at' => DateField::class,
            'project_deleted_at' => DateField::class,
        ];
    }
}