<?php

namespace App\Modules\Features\C\Profile\GraphQL\Query;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use App\Modules\Features\C\Profile\Models\Profile;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;

class PaginationProfile extends Query
{
    protected $attributes = [
        'name' => 'PaginationProfile'
    ];

    public function type()
    {
        return GraphQL::paginate('Profile');
    }

    public function args()
    {
        return [
            'profile_id' => [
                'type' => Type::id()
            ],
            'profile_name' => [
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
        
        $profile_id = isset($args['profile_id']) ? $args['profile_id'] : false;
        $profile_name = isset($args['profile_name']) ? $args['profile_name'] : false;

        $limit = isset($args['limit']) ? $args['limit'] : config('app.page_limit');
        $page = isset($args['page']) ? $args['page'] : 1;

        return Profile::select($select)
                        ->when($profile_id, function ($query) use ($profile_id) {
                            return $query->where('profile_id', '=', $profile_id);
                        })
                        ->when($profile_name, function ($query) use ($profile_name) {
                            return $query->where('profile_name', 'like', '%'.$profile_name.'%');
                        })
                        ->with($with)
                        ->paginate($limit, ['*'], 'pages', $page);
    }
}