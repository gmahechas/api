<?php

namespace App\Modules\Features\E\Workflow\GraphQL\Type;

use GraphQL;
use App\Modules\Shared\GraphQL\Field\DateField;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class WorkflowType extends GraphQLType
{
    protected $attributes = [
        'name' => 'WorkflowType',
        'model' => \App\Modules\Features\E\Workflow\Models\Workflow::class
    ];

    public function fields()
    {
        return [
            'workflow_id' => [
            	'type' => Type::id()
            ],
            'workflow_name' => [
            	'type' => Type::string()
            ],
            'workflow_description' => [
            	'type' => Type::string()
            ],
            'workflow_first_activities' => [
            	'type' => Type::string()
            ],
            'workflow_edit_activities' => [
            	'type' => Type::string()
            ],
            'workflow_latest_activities' => [
            	'type' => Type::string()
            ],
            'workflow_created_at' => DateField::class,
            'workflow_updated_at' => DateField::class,
            'workflow_deleted_at' => DateField::class,
        ];
    }
}