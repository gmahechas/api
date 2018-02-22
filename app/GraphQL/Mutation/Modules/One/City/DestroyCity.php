<?php

namespace App\GraphQL\Mutation\Modules\One\City;

use GraphQL;
use App\Models\Modules\One\City;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;

class DestroyCity extends Mutation
{
    protected $attributes = [
        'name' => 'DestroyCity'
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
        ];
    }

    public function resolve($root, $args, SelectFields $fields, ResolveInfo $info)
    {
        $select = $fields->getSelect();
        $with = $fields->getRelations();

        if($data = City::select($select)->with($with)->find($args['city_id']))
        {
            return $data->delete();
        } else {
            return null;
        }
    }
}