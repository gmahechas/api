<?php

namespace App\Modules\Features\E\Workflow\GraphQL\Query;

use GraphQL;
use App\Modules\Features\E\Workflow\Models\Workflow;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;

class PaginationWorkflow extends Query
{
    protected $attributes = [
        'name' => 'PaginationWorkflow'
    ];

    public function type()
    {
        return GraphQL::paginate('Workflow');
    }

    public function args()
    {
        return [
            'workflow_id' => [
                'type' => Type::id()
            ],
            'workflow_name' => [
                'type' => Type::string()
            ],
            'limit' => [
                'type' => Type::int()
            ],
            'page' => [
                'type' => Type::int()
            ],
        ];
    }

    public function resolve($root, $args, SelectFields $fields, ResolveInfo $info)
    {
        $select = $fields->getSelect();
        $with = $fields->getRelations();

        $workflow_id = isset($args['workflow_id']) ? $args['workflow_id'] : false;
        $workflow_name = isset($args['workflow_name']) ? $args['workflow_name'] : false;

        $limit = isset($args['limit']) ? $args['limit'] : config('app.page_limit');
        $page = isset($args['page']) ? $args['page'] : 1;

        return Workflow::select($select)
                        ->when($workflow_id, function ($query) use ($workflow_id) {
                            return $query->where('workflow_id', '=', $workflow_id);
                        })
                        ->when($workflow_name, function ($query) use ($workflow_name) {
                            return $query->where('workflow_name', 'like', '%'.$workflow_name.'%');
                        })
                        ->with($with)
                        ->paginate($limit, ['*'], 'pages', $page);
    }
}