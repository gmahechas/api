<?php

namespace App\Modules\Features\B\Department\GraphQL\Mutation;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;
use App\Modules\Features\B\Department\Models\Department;

class UpdateDepartment extends Mutation
{
    protected $attributes = [
        'name' => 'UpdateDepartment'
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
            ],
            'department_name' => [
                'type' => Type::string()
            ],
            'department_description' => [
                'type' => Type::string()
            ],
        ];
    }

    public function resolve($root, $args, SelectFields $fields, ResolveInfo $info)
    {
        $select = $fields->getSelect();
        $with = $fields->getRelations();

        if($data = Department::select($select)->with($with)->find($args['department_id']))
        {
            foreach($args as $key => $value)
            {
                if($data->{$key} != $value)
                {
                    $data->{$key} = $value;
                }
            }

            if($data->isDirty())
            {
                $data->save();
                return $data->refresh();
            } else {
                return null;
            }

        } else {
            return null;
        }
    }
}