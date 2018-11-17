<?php

namespace App\Modules\Features\D\Project\GraphQL\Mutation;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use App\Modules\Features\D\Project\Models\Project;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;

class StoreProject extends Mutation
{
    protected $attributes = [
        'name' => 'StoreProject'
    ];

    public function type()
    {
        return GraphQL::type('Project');
    }

    public function args()
    {
        return [
            'project_name' => [
                'type' => Type::string(),
                'rules' => ['required']
            ],
            'project_address' => [
                'type' => Type::string(),
                'rules' => ['required']
            ],
            'project_phone' => [
                'type' => Type::string(),
                'rules' => ['required']
            ],
            'macroproject_id' => [
                'type' => Type::id(),
                'rules' => ['required']
            ]
        ];
    }

    public function resolve($root, $args, SelectFields $fields, ResolveInfo $info)
    {
        return Project::create($args);
    }
}