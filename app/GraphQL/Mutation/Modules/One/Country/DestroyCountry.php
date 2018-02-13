<?php

namespace App\GraphQL\Mutation\Modules\One\Country;

use GraphQL;
use GraphQL\Type\Definition\Type;
use App\Models\Modules\One\Country;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;

class DestroyCountry extends Mutation
{
    protected $attributes = [
        'name' => 'DestroyCountry'
    ];

    public function type()
    {
        return GraphQL::type('Country');
    }

    public function args()
    {
        return [
            'country_id' => [
                'type' => Type::nonNull(Type::id()),
                'rules' => ['required']
            ],
        ];
    }

    public function resolve($root, $args, SelectFields $fields, ResolveInfo $info)
    {
        $select = $fields->getSelect();
        $with = $fields->getRelations();

        if($return_data = Country::select($select)->with($with)->find($args['country_id']))
        {
            return $return_data->delete();
        }else{
            return null;
        }
    }
}