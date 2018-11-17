<?php

namespace App\Modules\Features\A\Estate\GraphQL\Mutation;

use GraphQL;
use App\Modules\Features\A\Estate\Models\Estate;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;

class UpdateEstate extends Mutation
{
    protected $attributes = [
        'name' => 'UpdateEstate'
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
            'estate_name' => [
                'type' => Type::string()            
            ],
            'estate_code' => [
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

        if($data = Estate::select($select)->with($with)->find($args['estate_id']))
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