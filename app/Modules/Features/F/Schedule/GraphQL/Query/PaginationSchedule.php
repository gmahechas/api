<?php

namespace App\Modules\Features\F\Schedule\GraphQL\Query;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;
use App\Modules\Features\F\Schedule\Models\Schedule;

class PaginationSchedule extends Query
{
    protected $attributes = [
        'name' => 'PaginationSchedule'
    ];

    public function type()
    {
        return GraphQL::paginate('Schedule');
    }

    public function args()
    {
        return [
            'schedule_id' => [
                'type' => Type::id()
            ],
            'schedule_name' => [
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

        $schedule_id = isset($args['schedule_id']) ? $args['schedule_id'] : false;
        $schedule_name = isset($args['schedule_name']) ? $args['schedule_name'] : false;

        $limit = isset($args['limit']) ? $args['limit'] : config('app.page_limit');
        $page = isset($args['page']) ? $args['page'] : 1;

        return Schedule::select($select)
                        ->when($schedule_id, function ($query) use ($schedule_id) {
                            return $query->where('schedule_id', '=', $schedule_id);
                        })
                        ->when($schedule_name, function ($query) use ($schedule_name) {
                            return $query->where('schedule_name', 'like', '%'.$schedule_name.'%');
                        })
                        ->with($with)
                        ->paginate($limit, ['*'], 'pages', $page);
    }
}