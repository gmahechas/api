<?php

namespace App\Modules\Features\B\Department\GraphQL\Query;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;
use App\Modules\Features\B\Department\Models\Department;

class PaginationDepartment extends Query
{
    protected $attributes = [
        'name' => 'PaginationDepartment'
    ];

    public function type()
    {
        return GraphQL::paginate('Department');
    }

    public function args()
    {
        return [
            'department_id' => [
                'type' => Type::id()
            ],
            'department_name' => [
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

        $department_id = isset($args['department_id']) ? $args['department_id'] : false;
        $department_name = isset($args['department_name']) ? $args['department_name'] : false;

        $limit = isset($args['limit']) ? $args['limit'] : config('app.page_limit');
        $page = isset($args['page']) ? $args['page'] : 1;

        return Department::select($select)
                        ->when($department_id, function ($query) use ($department_id) {
                            return $query->where('department_id', '=', $department_id);
                        })
                        ->when($department_name, function ($query) use ($department_name) {
                            return $query->where('department_name', 'like', '%'.$department_name.'%');
                        })
                        ->with($with)
                        ->paginate($limit, ['*'], 'pages', $page);
    }
}