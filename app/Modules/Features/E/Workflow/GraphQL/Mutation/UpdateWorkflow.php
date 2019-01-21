<?php

namespace App\Modules\Features\E\Workflow\GraphQL\Mutation;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;
use App\Modules\Features\E\Workflow\Models\Workflow;

class UpdateWorkflow extends Mutation
{
    protected $attributes = [
        'name' => 'UpdateWorkflow'
    ];

    public function type()
    {
        return GraphQL::type('Workflow');
    }

    public function args()
    {
        return [
            'workflow_id' => [
                'type' => Type::nonNull(Type::id()),
                'rules' => ['required']
            ],
            'workflow_name' => [
            	'type' => Type::string()
            ],
            'workflow_description' => [
            	'type' => Type::string()
            ],
            'workflow_first_activities' => [
                'type' => Type::string()
            ],
            'workflow_edit_activities' => [
                'type' => Type::string()
            ],
            'workflow_latest_activities' => [
                'type' => Type::string()
            ]
        ];
    }

    public function resolve($root, $args, SelectFields $fields, ResolveInfo $info)
    {
        $select = $fields->getSelect();
        $with = $fields->getRelations();

        if($data = Workflow::select($select)->with($with)->find($args['workflow_id']))
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