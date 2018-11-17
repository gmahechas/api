<?php

namespace App\Modules\Features\A\Estate\GraphQL\Mutation;

use GraphQL;
use App\Modules\Features\A\Estate\Models\Estate;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;

class DestroyEstate extends Mutation
{
    protected $attributes = [
        'name' => 'DestroyEstate'
    ];

    public function type()
    {
        return GraphQL::type('Estate');
    }

    public function args()
    {
        return [
            'estate_id' => [
                'type' => Type::nonNull(Type::id()),
                'rules' => ['required']
            ],
        ];
    }

    public function resolve($root, $args, SelectFields $fields, ResolveInfo $info)
    {
        $select = $fields->getSelect();
        $with = $fields->getRelations();

        if($data = Estate::select($select)->with($with)->find($args['estate_id']))
        {
            $data_return = $data;
            $data->delete();
            return $data_return;
        } else {
            return null;
        }
    }
}