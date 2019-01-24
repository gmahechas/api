<?php

namespace App\Modules\Features\F\Schedule\GraphQL\Mutation;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;
use App\Modules\Features\F\Schedule\Models\Schedule;

class DestroySchedule extends Mutation
{
    protected $attributes = [
        'name' => 'DestroySchedule'
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
            ]
        ];
    }

    public function resolve($root, $args, SelectFields $fields, ResolveInfo $info)
    {
        $select = $fields->getSelect();
        $with = $fields->getRelations();

        if($data = Schedule::select($select)->with($with)->find($args['schedule_id']))
        {
            $data_return = $data;
            $data->delete();
            return $data_return;
        } else {
            return null;
        }
    }
}