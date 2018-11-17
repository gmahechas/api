<?php

namespace App\Modules\Features\A\City\GraphQL\Mutation;

use GraphQL;
use App\Modules\Features\A\City\Models\City;
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
            $data_return = $data;
            $data->delete();
            return $data_return;
        } else {
            return null;
        }
    }
}