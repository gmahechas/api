<?php

namespace App\Modules\Features\F\ScheduleDay\GraphQL\Mutation;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;
use App\Modules\Features\F\ScheduleDay\Models\ScheduleDay;

class DestroyScheduleDay extends Mutation
{
    protected $attributes = [
        'name' => 'DestroyScheduleDay'
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
            ]
        ];
    }

    public function resolve($root, $args, SelectFields $fields, ResolveInfo $info)
    {
        $select = $fields->getSelect();
        $with = $fields->getRelations();

        if($data = ScheduleDay::select($select)->with($with)->find($args['schedule_day_id']))
        {
            $data_return = $data;
            $data->delete();
            return $data_return;
        } else {
            return null;
        }
    }
}