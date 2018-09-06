<?php

namespace App\GraphQL\Query\Two\UserOffice;

use GraphQL;
use App\Models\Two\UserOffice;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;

class PaginationUserOffice extends Query
{
    protected $attributes = [
        'name' => 'PaginationUserOffice'
    ];

    public function type()
    {
        return GraphQL::paginate('UserOffice');
    }

    public function args()
    {
        return [
            'user_office_id' => [
                'type' => Type::id()
            ],
            'user_office_status' => [
                'type' => Type::string()
            ],
            'user_id' => [
                'type' => Type::id()
            ],
            'office_id' => [
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

        $user_office = isset($args['user_office']) ? $args['user_office'] : false;
        $user_office_status = isset($args['user_office_status']) ? $args['user_office_status'] : false;
        $user_id = isset($args['user_id']) ? $args['user_id'] : false;
        $office_id = isset($args['office_id']) ? $args['office_id'] : false;
        
        $limit = isset($args['limit']) ? $args['limit'] : config('app.page_limit');
        $page = isset($args['page']) ? $args['page'] : 1;

        return UserOffice::select($select)
                        ->when($user_office, function ($query) use ($user_office) {
                            return $query->where('user_office', '=', $user_office);
                        })
                        ->when($user_office_status, function ($query) use ($user_office_status) {
                            return $query->where('user_office_status', 'like', '%'.$user_office_status.'%');
                        })
                        ->when($user_id, function ($query) use ($user_id) {
                            return $query->where('user_id', '=', $user_id);
                        })
                        ->when($office_id, function ($query) use ($office_id) {
                            return $query->where('office_id', '=', $office_id);
                        })
                        ->with($with)
                        ->paginate($limit, ['*'], 'pages', $page);
    }
}