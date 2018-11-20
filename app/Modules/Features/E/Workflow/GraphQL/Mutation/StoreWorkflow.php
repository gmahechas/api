<?php

namespace App\Modules\Features\E\Workflow\GraphQL\Mutation;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;
use App\Modules\Features\E\Workflow\Models\Workflow;

class StoreWorkflow extends Mutation
{
    protected $attributes = [
        'name' => 'StoreWorkflow'
    ];

    public function type()
    {
        return GraphQL::type('Workflow');
    }

    public function args()
    {
        return [
            'workflow_name' => [
                'type' => Type::string(),
                'rules' => ['required']
            ],
            'workflow_description' => [
                'type' => Type::string(),
                'rules' => ['required']
            ]
        ];
    }

    public function resolve($root, $args, SelectFields $fields, ResolveInfo $info)
    {
        return Workflow::create($args);
    }
}