<?php

namespace App\Modules\Features\E\Context\GraphQL\Query;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;
use App\Modules\Features\E\Context\Models\Context;

class PaginationContext extends Query
{
    protected $attributes = [
        'name' => 'PaginationContext'
    ];

    public function type()
    {
        return GraphQL::paginate('Context');
    }

    public function args()
    {
        return [
            'context_id' => [
                'type' => Type::id()
            ],
            'context_description' => [
                'type' => Type::string()
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

        $context_id = isset($args['context_id']) ? $args['context_id'] : false;
        $context_description = isset($args['context_description']) ? $args['context_description'] : false;
        $menu_id = isset($args['menu_id']) ? $args['menu_id'] : false;

        $limit = isset($args['limit']) ? $args['limit'] : config('app.page_limit');
        $page = isset($args['page']) ? $args['page'] : 1;

        return Context::select($select)
                        ->when($context_id, function ($query) use ($context_id) {
                            return $query->where('context_id', '=', $context_id);
                        })
                        ->when($context_description, function ($query) use ($context_description) {
                            return $query->where('context_description', 'like', '%'.$context_description.'%');
                        })
                        ->when($menu_id, function ($query) use ($menu_id) {
                            return $query->where('menu_id', '=', $menu_id);
                        })
                        ->with($with)
                        ->paginate($limit, ['*'], 'pages', $page);
    }
}