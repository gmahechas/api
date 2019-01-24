<?php

namespace App\Modules\Features\F\ScheduleDay\GraphQL\Query;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;
use App\Modules\Features\F\ScheduleDay\Models\ScheduleDay;

class PaginationScheduleDay extends Query
{
    protected $attributes = [
        'name' => 'PaginationScheduleDay'
    ];

    public function type()
    {
        return GraphQL::paginate('ScheduleDay');
    }

    public function args()
    {
        return [
            'schedule_day_id' => [
                'type' => Type::id()
            ],
            'schedule_day_status' => [
                'type' => Type::boolean()
            ],
            'schedule_id' => [
                'type' => Type::id()
            ],
            'day_id' => [
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

        $schedule_day_id = isset($args['schedule_day_id']) ? $args['schedule_day_id'] : false;
        $schedule_day_status = (isset($args['schedule_day_status'])) ? true : false;
        $schedule_id = isset($args['schedule_id']) ? $args['schedule_id'] : false;
        $day_id = isset($args['day_id']) ? $args['day_id'] : false;

        $limit = isset($args['limit']) ? $args['limit'] : config('app.page_limit');
        $page = isset($args['page']) ? $args['page'] : 1;

        return ScheduleDay::select($select)
                        ->when($schedule_day_id, function ($query) use ($schedule_day_id) {
                            return $query->where('schedule_day_id', '=', $schedule_day_id);
                        })
                        ->when($schedule_day_status, function ($query) use ($args)  {
                            return $query->where('schedule_day_status', '=', $args['schedule_day_status']);
                        })
                        ->when($schedule_id, function ($query) use ($schedule_id) {
                            return $query->where('schedule_id', '=', $schedule_id);
                        })
                        ->when($day_id, function ($query) use ($day_id) {
                            return $query->where('day_id', '=', $day_id);
                        })
                        ->with($with)
                        ->paginate($limit, ['*'], 'pages', $page);
    }
}