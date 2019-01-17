<?php

namespace App\Modules\Features\B\OfficeDepartment\GraphQL\Mutation;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;
use App\Modules\Features\B\OfficeDepartment\Models\OfficeDepartment;

class StoreOfficeDepartment extends Mutation
{
    protected $attributes = [
        'name' => 'StoreOfficeDepartment'
    ];

    public function type()
    {
        return GraphQL::type('OfficeDepartment');
    }

    public function args()
    {
        return [
            'office_department_status' => [
                'type' => Type::boolean(),
                'rules' => ['required']
            ],
            'office_id' => [
                'type' => Type::id(),
                'rules' => ['required']
            ],
            'department_id' => [
                'type' => Type::id(),
                'rules' => ['required']
            ],
        ];
    }

    public function resolve($root, $args, SelectFields $fields, ResolveInfo $info)
    {
        return OfficeDepartment::create($args);
    }
}