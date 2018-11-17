<?php

namespace App\Modules\Features\A\Country\GraphQL\Mutation;

use GraphQL;
use GraphQL\Type\Definition\Type;
use App\Modules\Features\A\Country\Models\Country;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;

class UpdateCountry extends Mutation
{
    protected $attributes = [
        'name' => 'UpdateCountry'
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
            'country_name' => [
                'type' => Type::string()            
            ],
            'country_code' => [
                'type' => Type::string()
            ]
        ];
    }

    public function resolve($root, $args, SelectFields $fields, ResolveInfo $info)
    {
        $select = $fields->getSelect();
        $with = $fields->getRelations();

        if($data = Country::select($select)->with($with)->find($args['country_id']))
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