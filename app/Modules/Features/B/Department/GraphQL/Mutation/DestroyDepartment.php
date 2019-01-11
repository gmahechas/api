<?php

namespace App\Modules\Features\B\Department\GraphQL\Mutation;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;
use App\Modules\Features\B\Department\Models\Department;

class DestroyDepartment extends Mutation
{
    protected $attributes = [
        'name' => 'DestroyDepartment'
    ];

    public function type()
    {
        return GraphQL::type('Department');
    }

    public function args()
    {
        return [
            'department_id' => [
                'type' => Type::nonNull(Type::id()),
                'rules' => ['required']
            ]
        ];
    }

    public function resolve($root, $args, SelectFields $fields, ResolveInfo $info)
    {
        $select = $fields->getSelect();
        $with = $fields->getRelations();

        if($data = Department::select($select)->with($with)->find($args['department_id']))
        {
            $data_return = $data;
            $data->delete();
            return $data_return;
        } else {
            return null;
        }
    }
}