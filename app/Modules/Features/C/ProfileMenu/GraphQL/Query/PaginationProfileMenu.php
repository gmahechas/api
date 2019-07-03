<?php

namespace App\Modules\Features\C\ProfileMenu\GraphQL\Query;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use App\Modules\Features\C\ProfileMenu\Models\ProfileMenu;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;

class PaginationProfileMenu extends Query
{
    protected $attributes = [
        'name' => 'PaginationProfileMenu',
    ];

    public function type()
    {
        return GraphQL::paginate('ProfileMenu');
    }

    public function args()
    {
        return [
            'profile_menu_id' => [
                'type' => Type::id()
            ],
            'profile_menu_status' => [
                'type' => Type::string()
            ],
            'profile_id' => [
                'type' => Type::id()
            ],
            'menu_id' => [
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

        $profile_menu_id = isset($args['profile_menu_id']) ? $args['profile_menu_id'] : false;
        $profile_menu_status = isset($args['profile_menu_status']) ? $args['profile_menu_status'] : false;
        $profile_id = isset($args['profile_id']) ? $args['profile_id'] : false;
        $menu_id = isset($args['menu_id']) ? $args['menu_id'] : false;

        $limit = isset($args['limit']) ? $args['limit'] : config('app.page_limit');
        $page = isset($args['page']) ? $args['page'] : 1;

        return ProfileMenu::select($select)
                        ->when($profile_menu_id, function ($query) use ($profile_menu_id) {
                            return $query->where('profile_menu_id', '=', $profile_menu_id);
                        })
                        ->when($profile_menu_status, function ($query) use ($profile_menu_status) {
                            return $query->where('profile_menu_status', '=', '"' . $profile_menu_status . '"');
                        })
                        ->when($profile_id, function ($query) use ($profile_id) {
                            return $query->where('profile_id', '=', $profile_id);
                        })
                        ->when($menu_id, function ($query) use ($menu_id) {
                            return $query->where('menu_id', '=', $menu_id);
                        })
                        ->with($with)
                        ->paginate($limit, ['*'], 'pages', $page);

    }
}
