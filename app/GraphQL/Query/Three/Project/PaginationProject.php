<?php

namespace App\GraphQL\Query\Three\Project;

use GraphQL;
use App\Models\Three\Project;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;

class PaginationProject extends Query
{
    protected $attributes = [
        'name' => 'PaginationProject'
    ];

    public function type()
    {
        return GraphQL::paginate('Project');
    }

    public function args()
    {
        return [
            'project_id' => [
                'type' => Type::id()
            ],
            'project_name' => [
                'type' => Type::string()
            ],
            'macroproject_id' => [
                'type' => Type::id()
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

        $project_id = isset($args['project_id']) ? $args['project_id'] : false;
        $project_name = isset($args['project_name']) ? $args['project_name'] : false;
        $macroproject_id = isset($args['macroproject_id']) ? $args['macroproject_id'] : false;
        
        $limit = isset($args['limit']) ? $args['limit'] : config('app.page_limit');
        $page = isset($args['page']) ? $args['page'] : 1;

        return Project::select($select)
                        ->when($project_id, function ($query) use ($project_id) {
                            return $query->where('project_id', '=', $project_id);
                        })
                        ->when($project_name, function ($query) use ($project_name) {
                            return $query->where('project_name', 'like', '%'.$project_name.'%');
                        })
                        ->when($macroproject_id, function ($query) use ($macroproject_id) {
                            return $query->where('macroproject_id', '=', $macroproject_id);
                        })
                        ->with($with)
                        ->paginate($limit, ['*'], 'pages', $page);
    }
}