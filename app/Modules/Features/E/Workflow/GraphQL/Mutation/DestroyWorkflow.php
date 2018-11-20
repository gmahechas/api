<?php

namespace App\Modules\Features\E\Workflow\GraphQL\Mutation;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;
use App\Modules\Features\E\Workflow\Models\Workflow;

class DestroyWorkflow extends Mutation
{
    protected $attributes = [
        'name' => 'DestroyWorkflow'
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
            ]
        ];
    }

    public function resolve($root, $args, SelectFields $fields, ResolveInfo $info)
    {
        $select = $fields->getSelect();
        $with = $fields->getRelations();

        if($data = Workflow::select($select)->with($with)->find($args['workflow_id']))
        {
            $data_return = $data;
            $data->delete();
            return $data_return;
        } else {
            return null;
        }
    }
}