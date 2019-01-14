<?php

namespace App\Modules\Features\C\Employee\GraphQL\Mutation;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;
use App\Modules\Features\C\Employee\Models\Employee;

class StoreEmployee extends Mutation
{
    protected $attributes = [
        'name' => 'StoreEmployee'
    ];

    public function type()
    {
        return GraphQL::type('Employee');
    }

    public function args()
    {
        return [
            'employee_gender' => [
                'type' => Type::string(),
                'rules' => ['required']
            ],
            'employee_birth_date' => [
                'type' => Type::string(),
                'rules' => ['required']
            ],
            'employee_hire_date' => [
                'type' => Type::string(),
                'rules' => ['required']
            ],
            'employee_business_mail' => [
                'type' => Type::string(),
                'rules' => ['required']
            ],
            'person_id' => [
                'type' => Type::id(),
                'rules' => ['required']
            ],
            'city_birth_id' => [
                'type' => Type::id(),
                'rules' => ['required']
            ],
        ];
    }

    public function resolve($root, $args, SelectFields $fields, ResolveInfo $info)
    {
        return Employee::create($args);
    }
}