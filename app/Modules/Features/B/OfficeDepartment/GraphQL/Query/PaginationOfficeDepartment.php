<?php

namespace App\Modules\Features\B\OfficeDepartment\GraphQL\Query;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;
use App\Modules\Features\B\OfficeDepartment\Models\OfficeDepartment;

class PaginationOfficeDepartment extends Query
{
    protected $attributes = [
        'name' => 'PaginationOfficeDepartment'
    ];

    public function type()
    {
        return GraphQL::paginate('OfficeDepartment');
    }

    public function args()
    {
        return [
            'office_department_id' => [
                'type' => Type::id()
            ],
            'office_department_status' => [
                'type' => Type::boolean()
            ],
            'office_id' => [
                'type' => Type::id()
            ],
            'department_id' => [
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

        $office_department_id = isset($args['office_department_id']) ? $args['office_department_id'] : false;
        $office_department_status = (isset($args['office_department_status'])) ? true : false;
        $office_id = isset($args['office_id']) ? $args['office_id'] : false;
        $department_id = isset($args['department_id']) ? $args['department_id'] : false;

        $limit = isset($args['limit']) ? $args['limit'] : config('app.page_limit');
        $page = isset($args['page']) ? $args['page'] : 1;

        return OfficeDepartment::select($select)
                        ->when($office_department_id, function ($query) use ($office_department_id) {
                            return $query->where('office_department_id', '=', $office_department_id);
                        })
                        ->when($office_department_status, function ($query) use ($args)  {
                            return $query->where('office_department_status', '=', $args['office_department_status']);
                        })
                        ->when($office_id, function ($query) use ($office_id) {
                            return $query->where('office_id', '=', $office_id);
                        })
                        ->when($department_id, function ($query) use ($department_id) {
                            return $query->where('department_id', '=', $department_id);
                        })
                        ->with($with)
                        ->paginate($limit, ['*'], 'pages', $page);
    }
}