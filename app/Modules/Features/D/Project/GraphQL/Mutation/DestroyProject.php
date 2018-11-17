<?php

namespace App\Modules\Features\D\Project\GraphQL\Mutation;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use App\Modules\Features\D\Project\Models\Project;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;

class DestroyProject extends Mutation
{
    protected $attributes = [
        'name' => 'DestroyProject'
    ];

    public function type()
    {
        return GraphQL::type('Project');
    }

    public function args()
    {
        return [
            'project_id' => [
                'type' => Type::nonNull(Type::id()),
                'rules' => ['required']
            ],
        ];
    }

    public function resolve($root, $args, SelectFields $fields, ResolveInfo $info)
    {
        $select = $fields->getSelect();
        $with = $fields->getRelations();

        if($data = Project::select($select)->with($with)->find($args['project_id']))
        {
            $data_return = $data;
            $data->delete();
            return $data_return;
        } else {
            return null;
        }
    }
}