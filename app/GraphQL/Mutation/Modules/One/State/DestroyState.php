<?php

namespace App\GraphQL\Mutation\Modules\One\State;

use GraphQL;
use App\Models\Modules\One\State;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;

class DestroyState extends Mutation
{
    protected $attributes = [
        'name' => 'DestroyState'
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
        ];
    }

    public function resolve($root, $args, SelectFields $fields, ResolveInfo $info)
    {
        $select = $fields->getSelect();
        $with = $fields->getRelations();

        if($data = State::select($select)->with($with)->find($args['state_id']))
        {
            return $data->delete();
        } else {
            return null;
        }
    }
}