<?php

namespace App\Modules\Features\B\Office\GraphQL\Mutation;

use GraphQL;
use GraphQL\Type\Definition\Type;
use App\Modules\Features\B\Office\Models\Office;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;

class UpdateOffice extends Mutation
{
    protected $attributes = [
        'name' => 'UpdateOffice'
    ];

    public function type()
    {
        return GraphQL::type('Office');
    }

    public function args()
    {
        return [
            'office_id' => [
                'type' => Type::nonNull(Type::id()),
                'rules' => ['required']
            ],
            'office_name' => [
                'type' => Type::string()            
            ],
            'company_id' => [
                'type' => Type::id()
            ],
            'city_id' => [
                'type' => Type::id()
            ]
        ];
    }

    public function resolve($root, $args, SelectFields $fields, ResolveInfo $info)
    {
        $select = $fields->getSelect();
        $with = $fields->getRelations();

        if($data = Office::select($select)->with($with)->find($args['office_id']))
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