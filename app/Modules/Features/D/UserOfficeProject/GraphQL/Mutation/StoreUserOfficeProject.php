<?php

namespace App\Modules\Features\D\UserOfficeProject\GraphQL\Mutation;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;
use App\Modules\Features\D\UserOfficeProject\Models\UserOfficeProject;

class StoreUserOfficeProject extends Mutation
{
    protected $attributes = [
        'name' => 'StoreUserOfficeProject'
    ];

    public function type()
    {
        return GraphQL::type('UserOfficeProject');
    }

    public function args()
    {
        return [
            'user_office_project_status' => [
                'type' => Type::boolean(),
                'rules' => ['required']
            ],
            'user_office_id' => [
                'type' => Type::id(),
                'rules' => ['required']
            ],
            'project_id' => [
                'type' => Type::id(),
                'rules' => ['required']
            ],
        ];
    }

    public function resolve($root, $args, SelectFields $fields, ResolveInfo $info)
    {
        return UserOfficeProject::create($args);
    }
}