<?php

namespace App\Modules\Features\C\Menu\GraphQL\Query;

use GraphQL;
use App\Modules\Features\C\Menu\Models\Menu;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;

class PaginationMenu extends Query
{
    protected $attributes = [
        'name' => 'PaginationMenu'
    ];

    public function type()
    {
        return GraphQL::paginate('Menu');
    }

    public function args()
    {
        return [
            'menu_id' => [
                'type' => Type::id()
            ],
            'menu_name' => [
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
        
        $menu_id = isset($args['menu_id']) ? $args['menu_id'] : false;
        $menu_name = isset($args['menu_name']) ? $args['menu_name'] : false;

        $limit = isset($args['limit']) ? $args['limit'] : config('app.page_limit');
        $page = isset($args['page']) ? $args['page'] : 1;

        return Menu::select($select)
                        ->when($menu_id, function ($query) use ($menu_id) {
                            return $query->where('menu_id', '=', $menu_id);
                        })
                        ->when($menu_name, function ($query) use ($menu_name) {
                            return $query->where('menu_name', 'like', '%'.$menu_name.'%');
                        })
                        ->with($with)
                        ->paginate($limit, ['*'], 'pages', $page);
    }
}