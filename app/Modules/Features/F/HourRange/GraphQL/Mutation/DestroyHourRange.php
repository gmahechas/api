<?php

namespace App\Modules\Features\F\HourRange\GraphQL\Mutation;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;
use App\Modules\Features\F\HourRange\Models\HourRange;

class DestroyHourRange extends Mutation
{
    protected $attributes = [
        'name' => 'DestroyHourRange'
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
            ]
        ];
    }

    public function resolve($root, $args, SelectFields $fields, ResolveInfo $info)
    {
        $select = $fields->getSelect();
        $with = $fields->getRelations();

        if($data = HourRange::select($select)->with($with)->find($args['hour_range_id']))
        {
            $data_return = $data;
            $data->delete();
            return $data_return;
        } else {
            return null;
        }
    }
}