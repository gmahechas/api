<?php

namespace App\Modules\Features\D\UserOfficeProject\GraphQL\Query;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use App\Modules\Features\D\UserOfficeProject\Models\UserOfficeProject;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;

class PaginationUserOfficeProject extends Query
{
    protected $attributes = [
        'name' => 'PaginationUserOfficeProject'
    ];

    public function type()
    {
        return GraphQL::paginate('UserOfficeProject');
    }

    public function args()
    {
        return [
            'user_office_project_id' => [
                'type' => Type::id()
            ],
            'user_office_project_status' => [
                'type' => Type::boolean()
            ],
            'user_office_id' => [
                'type' => Type::id()
            ],
            'project_id' => [
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

        $user_office_project_id = isset($args['user_office_project_id']) ? $args['user_office_project_id'] : false;
        $user_office_project_status = (isset($args['user_office_project_status'])) ? true : false;
        $user_office_id = isset($args['user_office_id']) ? $args['user_office_id'] : false;
        $project_id = isset($args['project_id']) ? $args['project_id'] : false;
        
        $limit = isset($args['limit']) ? $args['limit'] : config('app.page_limit');
        $page = isset($args['page']) ? $args['page'] : 1;

        return UserOfficeProject::select($select)
                        ->when($user_office_project_id, function ($query) use ($user_office_project_id) {
                            return $query->where('user_office_project_id', '=', $user_office_project_id);
                        })
                        ->when($user_office_project_status, function ($query) use ($args)  {
                            return $query->where('user_office_project_status', '=', $args['user_office_project_status']);
                        })
                        ->when($user_office_id, function ($query) use ($user_office_id) {
                            return $query->where('user_office_id', '=', $user_office_id);
                        })
                        ->when($project_id, function ($query) use ($project_id) {
                            return $query->where('project_id', '=', $project_id);
                        })
                        ->with($with)
                        ->paginate($limit, ['*'], 'pages', $page);
    }
}