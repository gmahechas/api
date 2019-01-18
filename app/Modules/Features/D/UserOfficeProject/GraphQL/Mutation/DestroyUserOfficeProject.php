<?php

namespace App\Modules\Features\D\UserOfficeProject\GraphQL\Mutation;

use GraphQL;
use App\Modules\Features\D\UserOfficeProject\Models\UserOfficeProject;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;

class DestroyUserOfficeProject extends Mutation
{
    protected $attributes = [
        'name' => 'DestroyUserOfficeProject',
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
            ]
        ];
    }

    public function resolve($root, $args, SelectFields $fields, ResolveInfo $info)
    {
        $select = $fields->getSelect();
        $with = $fields->getRelations();

        if($data = UserOfficeProject::select($select)->with($with)->find($args['user_office_project_id']))
        {
            $data_return = $data;
            $data->delete();
            return $data_return;
        } else {
            return null;
        }
    }
}