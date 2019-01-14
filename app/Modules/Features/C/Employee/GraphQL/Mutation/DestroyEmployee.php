<?php

namespace App\Modules\Features\C\Employee\GraphQL\Mutation;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;
use App\Modules\Features\C\Employee\Models\Employee;

class DestroyEmployee extends Mutation
{
    protected $attributes = [
        'name' => 'DestroyEmployee'
    ];

    public function type()
    {
        return GraphQL::type('Employee');
    }

    public function args()
    {
        return [
            'employee_id' => [
                'type' => Type::nonNull(Type::id()),
                'rules' => ['required']
            ]
        ];
    }

    public function resolve($root, $args, SelectFields $fields, ResolveInfo $info)
    {
        $select = $fields->getSelect();
        $with = $fields->getRelations();

        if($data = Employee::select($select)->with($with)->find($args['employee_id']))
        {
            $data_return = $data;
            $data->delete();
            return $data_return;
        } else {
            return null;
        }
    }
}