<?php

namespace App\GraphQL\Query\Modules\Two\Menu;

use GraphQL;
use App\Models\Modules\Two\Menu;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;

class ShowMenu extends Query
{
    protected $attributes = [
        'name' => 'ShowMenu'
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

        $limit = isset($args['limit']) ? $args['limit'] : 10000;
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