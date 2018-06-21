<?php

namespace App\GraphQL\Mutation\Modules\One\City;

use GraphQL;
use App\Models\Modules\One\City;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;

class UpdateCity extends Mutation
{
    protected $attributes = [
        'name' => 'UpdateCity'
    ];

    public function type()
    {
        return GraphQL::type('City');
    }

    public function args()
    {
        return [
            'city_id' => [
                'type' => Type::nonNull(Type::id()),
                'rules' => ['required']
            ],
            'city_name' => [
                'type' => Type::string()            
            ],
            'city_code' => [
                'type' => Type::string()
            ],
            'state_id' => [
                'type' => Type::int()
            ]
        ];
    }

    public function resolve($root, $args, SelectFields $fields, ResolveInfo $info)
    {
        $select = $fields->getSelect();
        $with = $fields->getRelations();

        if($data = City::select($select)->with($with)->find($args['city_id']))
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