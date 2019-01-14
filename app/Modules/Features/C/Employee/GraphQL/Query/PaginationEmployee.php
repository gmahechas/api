<?php

namespace App\Modules\Features\C\Employee\GraphQL\Query;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;
use App\Modules\Features\C\Employee\Models\Employee;

class PaginationEmployee extends Query
{
    protected $attributes = [
        'name' => 'PaginationEmployee'
    ];

    public function type()
    {
        return GraphQL::paginate('Employee');
    }

    public function args()
    {
        return [
            'employee_id' => [
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

        $employee_id = isset($args['employee_id']) ? $args['employee_id'] : false;

        $limit = isset($args['limit']) ? $args['limit'] : config('app.page_limit');
        $page = isset($args['page']) ? $args['page'] : 1;

        return Employee::select($select)
                        ->when($employee_id, function ($query) use ($employee_id) {
                            return $query->where('employee_id', '=', $employee_id);
                        })
                        ->with($with)
                        ->paginate($limit, ['*'], 'pages', $page);
    }
}