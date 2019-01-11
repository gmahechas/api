<?php

namespace App\Modules\Features\E\ContextVar\GraphQL\Query;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;
use App\Modules\Features\E\ContextVar\Models\ContextVar;

class PaginationContextVar extends Query
{
    protected $attributes = [
        'name' => 'PaginationContextVar'
    ];

    public function type()
    {
        return GraphQL::paginate('ContextVar');
    }

    public function args()
    {
        return [
            'context_var_id' => [
                'type' => Type::id()
            ],
            'context_var_description' => [
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

        $context_var_id = isset($args['context_var_id']) ? $args['context_var_id'] : false;
        $context_var_description = isset($args['context_var_description']) ? $args['context_var_description'] : false;

        $limit = isset($args['limit']) ? $args['limit'] : config('app.page_limit');
        $page = isset($args['page']) ? $args['page'] : 1;

        return ContextVar::select($select)
                        ->when($context_var_id, function ($query) use ($context_var_id) {
                            return $query->where('context_var_id', '=', $context_var_id);
                        })
                        ->when($context_var_description, function ($query) use ($context_var_description) {
                            return $query->where('context_var_description', 'like', '%'.$context_var_description.'%');
                        })
                        ->with($with)
                        ->paginate($limit, ['*'], 'pages', $page);
    }
}