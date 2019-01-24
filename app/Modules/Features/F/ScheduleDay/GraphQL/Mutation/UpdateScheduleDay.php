<?php

namespace App\Modules\Features\F\ScheduleDay\GraphQL\Mutation;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;
use App\Modules\Features\F\ScheduleDay\Models\ScheduleDay;

class UpdateScheduleDay extends Mutation
{
    protected $attributes = [
        'name' => 'UpdateScheduleDay'
    ];

    public function type()
    {
        return GraphQL::type('ScheduleDay');
    }

    public function args()
    {
        return [
            'schedule_day_id' => [
                'type' => Type::nonNull(Type::id()),
                'rules' => ['required']
            ],
            'schedule_day_status' => [
                'type' => Type::boolean()
            ]
        ];
    }

    public function resolve($root, $args, SelectFields $fields, ResolveInfo $info)
    {
        $select = $fields->getSelect();
        $with = $fields->getRelations();

        if($data = ScheduleDay::select($select)->with($with)->find($args['schedule_day_id']))
        {
            foreach($args as $key => $value)
            {
                if($data->{$key} != $value)
                {
                    $data->{$key} = $value;
                }
            }

            if($data->isDirty())
            {
                $data->save();
                return $data->refresh();
            } else {
                return null;
            }

        } else {
            return null;
        }
    }
}