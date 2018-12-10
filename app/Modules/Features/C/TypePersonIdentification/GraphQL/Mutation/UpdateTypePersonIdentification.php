<?php

namespace App\Modules\Features\C\TypePersonIdentification\GraphQL\Mutation;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;
use App\Modules\Features\C\TypePersonIdentification\Models\TypePersonIdentification;

class UpdateTypePersonIdentification extends Mutation
{
    protected $attributes = [
        'name' => 'UpdateTypePersonIdentification'
    ];

    public function type()
    {
        return GraphQL::type('TypePersonIdentification');
    }

    public function args()
    {
        return [
            'type_person_identification_id' => [
                'type' => Type::nonNull(Type::id()),
                'rules' => ['required']
            ],
            'type_person_identification_code' => [
                'type' => Type::string()
            ],
            'type_person_identification_description' => [
                'type' => Type::string()
            ],
        ];
    }

    public function resolve($root, $args, SelectFields $fields, ResolveInfo $info)
    {
        $select = $fields->getSelect();
        $with = $fields->getRelations();

        if($data = TypePersonIdentification::select($select)->with($with)->find($args['type_person_identification_id']))
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