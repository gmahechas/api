<?php

namespace App\Modules\Features\F\Day\GraphQL\Query;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;
use App\Modules\Features\F\Day\Models\Day;

class PaginationDay extends Query
{
    protected $attributes = [
        'name' => 'PaginationDay'
    ];

    public function type()
    {
        return GraphQL::paginate('Day');
    }

    public function args()
    {
        return [
            'day_id' => [
                'type' => Type::id()
            ],
            'day_name' => [
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

        $day_id = isset($args['day_id']) ? $args['day_id'] : false;
        $day_name = isset($args['day_name']) ? $args['day_name'] : false;

        $limit = isset($args['limit']) ? $args['limit'] : config('app.page_limit');
        $page = isset($args['page']) ? $args['page'] : 1;

        return Day::select($select)
                        ->when($day_id, function ($query) use ($day_id) {
                            return $query->where('day_id', '=', $day_id);
                        })
                        ->when($day_name, function ($query) use ($day_name) {
                            return $query->where('day_name', 'like', '%'.$day_name.'%');
                        })
                        ->with($with)
                        ->paginate($limit, ['*'], 'pages', $page);
    }
}