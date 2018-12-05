<?php

namespace App\Modules\Features\C\UserOffice\GraphQL\Query;

use GraphQL;
use App\Modules\Features\C\UserOffice\Models\UserOffice;
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
                'type' => Type::boolean()
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

        $user_office_id = isset($args['user_office_id']) ? $args['user_office_id'] : false;
        $user_office_status = isset($args['user_office_status']) ? true : false; ;
        $user_id = isset($args['user_id']) ? $args['user_id'] : false;
        $office_id = isset($args['office_id']) ? $args['office_id'] : false;
        
        $limit = isset($args['limit']) ? $args['limit'] : config('app.page_limit');
        $page = isset($args['page']) ? $args['page'] : 1;

        return UserOffice::select($select)
                        ->when($user_office_id, function ($query) use ($user_office_id) {
                            return $query->where('user_office_id', '=', $user_office_id);
                        })
                        ->when($user_office_status, function ($query) use ($args) {
                            return $query->where('user_office_status', '=', $args['user_office_status']);
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