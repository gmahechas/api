<?php

namespace App\Modules\Features\C\Employee\GraphQL\Mutation;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;
use App\Modules\Features\C\Employee\Models\Employee;

class UpdateEmployee extends Mutation
{
    protected $attributes = [
        'name' => 'UpdateEmployee'
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
            ],
            'employee_gender' => [
                'type' => Type::string()
            ],
            'employee_birth_date' => [
                'type' => Type::string()
            ],
            'employee_hire_date' => [
                'type' => Type::string()
            ],
            'employee_business_mail' => [
                'type' => Type::string()
            ],
            'person_id' => [
                'type' => Type::id()
            ],
            'city_birth_id' => [
                'type' => Type::id()
            ],
        ];
    }

    public function resolve($root, $args, SelectFields $fields, ResolveInfo $info)
    {
        $select = $fields->getSelect();
        $with = $fields->getRelations();

        if($data = Employee::select($select)->with($with)->find($args['employee_id']))
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