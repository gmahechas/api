<?php

namespace App\Modules\Features\B\Department\GraphQL\Mutation;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;
use App\Modules\Features\B\Department\Models\Department;

class StoreDepartment extends Mutation
{
    protected $attributes = [
        'name' => 'StoreDepartment'
    ];

    public function type()
    {
        return GraphQL::type('Department');
    }

    public function args()
    {
        return [
            'department_name' => [
                'type' => Type::string(),
                'rules' => ['required']
            ],
            'department_description' => [
                'type' => Type::string(),
                'rules' => ['required']
            ],
        ];
    }

    public function resolve($root, $args, SelectFields $fields, ResolveInfo $info)
    {
        return Department::create($args);
    }
}