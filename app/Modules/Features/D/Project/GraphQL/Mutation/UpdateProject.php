<?php

namespace App\Modules\Features\D\Project\GraphQL\Mutation;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use App\Modules\Features\D\Project\Models\Project;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;

class UpdateProject extends Mutation
{
    protected $attributes = [
        'name' => 'UpdateProject'
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
            'project_name' => [
                'type' => Type::string()            
            ],
            'project_address' => [
                'type' => Type::string()            
            ],
            'project_phone' => [
                'type' => Type::string()            
            ],
            'macroproject_id' => [
                'type' => Type::id()
            ]
        ];
    }

    public function resolve($root, $args, SelectFields $fields, ResolveInfo $info)
    {
        $select = $fields->getSelect();
        $with = $fields->getRelations();

        if($data = Project::select($select)->with($with)->find($args['project_id']))
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