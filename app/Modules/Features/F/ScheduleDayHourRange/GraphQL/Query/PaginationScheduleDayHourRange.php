<?php

namespace App\Modules\Features\F\ScheduleDayHourRange\GraphQL\Query;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;
use App\Modules\Features\F\ScheduleDayHourRange\Models\ScheduleDayHourRange;

class PaginationScheduleDayHourRange extends Query
{
    protected $attributes = [
        'name' => 'PaginationScheduleDayHourRange'
    ];

    public function type()
    {
        return GraphQL::paginate('ScheduleDayHourRange');
    }

    public function args()
    {
        return [
            'schedule_day_hour_range_id' => [
                'type' => Type::id()
            ],
            'schedule_day_hour_range_status' => [
                'type' => Type::boolean()
            ],
            'schedule_day_id' => [
                'type' => Type::id()
            ],
            'hour_range_id' => [
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

        $schedule_day_hour_range_id = isset($args['schedule_day_hour_range_id']) ? $args['schedule_day_hour_range_id'] : false;
        $schedule_day_hour_range_status = (isset($args['schedule_day_hour_range_status'])) ? true : false;
        $schedule_day_id = isset($args['schedule_day_id']) ? $args['schedule_day_id'] : false;
        $hour_range_id = isset($args['hour_range_id']) ? $args['hour_range_id'] : false;

        $limit = isset($args['limit']) ? $args['limit'] : config('app.page_limit');
        $page = isset($args['page']) ? $args['page'] : 1;

        return ScheduleDayHourRange::select($select)
                        ->when($schedule_day_hour_range_id, function ($query) use ($schedule_day_hour_range_id) {
                            return $query->where('schedule_day_hour_range_id', '=', $schedule_day_hour_range_id);
                        })
                        ->when($schedule_day_hour_range_status, function ($query) use ($args)  {
                            return $query->where('schedule_day_hour_range_status', '=', $args['schedule_day_hour_range_status']);
                        })
                        ->when($schedule_day_id, function ($query) use ($schedule_day_id) {
                            return $query->where('schedule_day_id', '=', $schedule_day_id);
                        })
                        ->when($hour_range_id, function ($query) use ($hour_range_id) {
                            return $query->where('hour_range_id', '=', $hour_range_id);
                        })
                        ->with($with)
                        ->paginate($limit, ['*'], 'pages', $page);
    }
}