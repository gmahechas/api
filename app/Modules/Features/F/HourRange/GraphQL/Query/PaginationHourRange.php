<?php

namespace App\Modules\Features\F\HourRange\GraphQL\Query;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;
use App\Modules\Features\F\HourRange\Models\HourRange;

class PaginationHourRange extends Query
{
    protected $attributes = [
        'name' => 'PaginationHourRange'
    ];

    public function type()
    {
        return GraphQL::paginate('HourRange');
    }

    public function args()
    {
        return [
            'hour_range_id' => [
                'type' => Type::id()
            ],
            'hour_range_name' => [
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

        $hour_range_id = isset($args['hour_range_id']) ? $args['hour_range_id'] : false;
        $hour_range_name = isset($args['hour_range_name']) ? $args['hour_range_name'] : false;

        $limit = isset($args['limit']) ? $args['limit'] : config('app.page_limit');
        $page = isset($args['page']) ? $args['page'] : 1;

        return HourRange::select($select)
                        ->when($hour_range_id, function ($query) use ($hour_range_id) {
                            return $query->where('hour_range_id', '=', $hour_range_id);
                        })
                        ->when($hour_range_name, function ($query) use ($hour_range_name) {
                            return $query->where('hour_range_name', 'like', '%'.$hour_range_name.'%');
                        })
                        ->with($with)
                        ->paginate($limit, ['*'], 'pages', $page);
    }
}