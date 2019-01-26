<?php

namespace App\Modules\Features\F\HourRange\GraphQL\Mutation;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;
use App\Modules\Features\F\HourRange\Models\HourRange;

class UpdateHourRange extends Mutation
{
    protected $attributes = [
        'name' => 'UpdateHourRange'
    ];

    public function type()
    {
        return GraphQL::type('HourRange');
    }

    public function args()
    {
        return [
            'hour_range_id' => [
                'type' => Type::nonNull(Type::id()),
                'rules' => ['required']
            ],
            'hour_range_name' => [
                'type' => Type::string()
            ],
            'hour_range_description' => [
                'type' => Type::string()
            ],
            'hour_range_start' => [
                'type' => Type::string()
            ],
            'hour_range_end' => [
                'type' => Type::string()
            ],
        ];
    }

    public function resolve($root, $args, SelectFields $fields, ResolveInfo $info)
    {
        $select = $fields->getSelect();
        $with = $fields->getRelations();

        if($data = HourRange::select($select)->with($with)->find($args['hour_range_id']))
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