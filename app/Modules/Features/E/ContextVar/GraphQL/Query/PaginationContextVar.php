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
            'context_var_code' => [
                'type' => Type::string()
            ],
            'context_var_type' => [
                'type' => Type::string()
            ],
            'context_var_description' => [
                'type' => Type::string()
            ],
            'context_id' => [
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

        $context_var_id = isset($args['context_var_id']) ? $args['context_var_id'] : false;
        $context_var_code = isset($args['context_var_code']) ? $args['context_var_code'] : false;
        $context_var_type = isset($args['context_var_type']) ? $args['context_var_type'] : false;
        $context_var_description = isset($args['context_var_description']) ? $args['context_var_description'] : false;
        $context_id = isset($args['context_id']) ? $args['context_id'] : false;

        $limit = isset($args['limit']) ? $args['limit'] : config('app.page_limit');
        $page = isset($args['page']) ? $args['page'] : 1;

        return ContextVar::select($select)
                        ->when($context_var_id, function ($query) use ($context_var_id) {
                            return $query->where('context_var_id', '=', $context_var_id);
                        })
                        ->when($context_var_code, function ($query) use ($context_var_code) {
                            return $query->where('context_var_code', 'like', '%'.$context_var_code.'%');
                        })
                        ->when($context_var_type, function ($query) use ($context_var_type) {
                            return $query->where('context_var_type', 'like', '%'.$context_var_type.'%');
                        })
                        ->when($context_var_description, function ($query) use ($context_var_description) {
                            return $query->where('context_var_description', 'like', '%'.$context_var_description.'%');
                        })
                        ->when($context_id, function ($query) use ($context_id) {
                            return $query->where('context_id', '=', $context_id);
                        })
                        ->with($with)
                        ->paginate($limit, ['*'], 'pages', $page);
    }
}