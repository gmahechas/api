<?php

namespace App\Modules\Features\D\UserOfficeProject\GraphQL\Mutation;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use App\Modules\Features\D\UserOfficeProject\Models\UserOfficeProject;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;

class UpdateUserOfficeProject extends Mutation
{
    protected $attributes = [
        'name' => 'UpdateUserOfficeProject',
    ];

    public function type()
    {
        return GraphQL::type('UserOfficeProject');
    }

    public function args()
    {
        return [
            'user_office_project_id' => [
                'type' => Type::nonNull(Type::id()),
                'rules' => ['required']
            ],
            'user_office_project_status' => [
                'type' => Type::string()
            ]
        ];
    }

    public function resolve($root, $args, SelectFields $fields, ResolveInfo $info)
    {
        $select = $fields->getSelect();
        $with = $fields->getRelations();

        if($data = UserOfficeProject::select($select)->with($with)->find($args['user_office_project_id']))
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