<?php

namespace App\Modules\Features\F\ScheduleDayHourRange\GraphQL\Mutation;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;
use App\Modules\Features\F\ScheduleDayHourRange\Models\ScheduleDayHourRange;

class DestroyScheduleDayHourRange extends Mutation
{
    protected $attributes = [
        'name' => 'DestroyScheduleDayHourRange'
    ];

    public function type()
    {
        return GraphQL::type('ScheduleDayHourRange');
    }

    public function args()
    {
        return [
            'schedule_day_hour_range_id' => [
                'type' => Type::nonNull(Type::id()),
                'rules' => ['required']
            ]
        ];
    }

    public function resolve($root, $args, SelectFields $fields, ResolveInfo $info)
    {
        $select = $fields->getSelect();
        $with = $fields->getRelations();

        if($data = ScheduleDayHourRange::select($select)->with($with)->find($args['schedule_day_hour_range_id']))
        {
            $data_return = $data;
            $data->delete();
            return $data_return;
        } else {
            return null;
        }
    }
}