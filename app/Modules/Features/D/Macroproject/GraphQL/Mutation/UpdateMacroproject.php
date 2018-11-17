<?php

namespace App\Modules\Features\D\Macroproject\GraphQL\Mutation;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;
use App\Modules\Features\D\Macroproject\Models\Macroproject;

class UpdateMacroproject extends Mutation
{
    protected $attributes = [
        'name' => 'UpdateMacroproject'
    ];

    public function type()
    {
        return GraphQL::type('Macroproject');
    }

    public function args()
    {
        return [
            'macroproject_id' => [
                'type' => Type::nonNull(Type::id()),
                'rules' => ['required']
            ],
            'macroproject_name' => [
                'type' => Type::string()            
            ],
            'macroproject_address' => [
                'type' => Type::string()            
            ],
            'macroproject_phone' => [
                'type' => Type::string()            
            ],
            'city_id' => [
                'type' => Type::id()
            ],
            'office_id' => [
                'type' => Type::id()
            ]
        ];
    }

    public function resolve($root, $args, SelectFields $fields, ResolveInfo $info)
    {
        $select = $fields->getSelect();
        $with = $fields->getRelations();

        if($data = Macroproject::select($select)->with($with)->find($args['macroproject_id']))
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