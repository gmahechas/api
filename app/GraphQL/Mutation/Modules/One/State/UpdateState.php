<?php

namespace App\GraphQL\Mutation\Modules\One\State;

use GraphQL;
use App\Models\Modules\One\State;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;

class UpdateState extends Mutation
{
    protected $attributes = [
        'name' => 'UpdateState'
    ];

    public function type()
    {
        return GraphQL::type('State');
    }

    public function args()
    {
        return [
            'state_id' => [
                'type' => Type::nonNull(Type::id()),
                'rules' => ['required']
            ],
            'state_name' => [
                'type' => Type::string()            
            ],
            'state_code' => [
                'type' => Type::string()
            ],
            'country_id' => [
                'type' => Type::id()
            ]
        ];
    }

    public function resolve($root, $args, SelectFields $fields, ResolveInfo $info)
    {
        $select = $fields->getSelect();
        $with = $fields->getRelations();

        if($data = State::select($select)->with($with)->find($args['state_id']))
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
                return $data;
            } else {
                return null;
            }

        } else {
            return null;
        }
    }
}