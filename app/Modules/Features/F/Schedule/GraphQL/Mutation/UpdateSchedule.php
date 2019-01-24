<?php

namespace App\Modules\Features\F\Schedule\GraphQL\Mutation;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;
use App\Modules\Features\F\Schedule\Models\Schedule;

class UpdateSchedule extends Mutation
{
    protected $attributes = [
        'name' => 'UpdateSchedule'
    ];

    public function type()
    {
        return GraphQL::type('Schedule');
    }

    public function args()
    {
        return [
            'schedule_id' => [
                'type' => Type::nonNull(Type::id()),
                'rules' => ['required']
            ],
            'schedule_name' => [
                'type' => Type::string()
            ],
        ];
    }

    public function resolve($root, $args, SelectFields $fields, ResolveInfo $info)
    {
        $select = $fields->getSelect();
        $with = $fields->getRelations();

        if($data = Schedule::select($select)->with($with)->find($args['schedule_id']))
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