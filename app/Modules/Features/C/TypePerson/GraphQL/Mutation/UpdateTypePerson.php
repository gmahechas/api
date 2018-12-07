<?php

namespace App\Modules\Features\C\TypePerson\GraphQL\Mutation;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;
use App\Modules\Features\C\TypePerson\Models\TypePerson;

class UpdateTypePerson extends Mutation
{
    protected $attributes = [
        'name' => 'UpdateTypePerson'
    ];

    public function type()
    {
        return GraphQL::type('TypePerson');
    }

    public function args()
    {
        return [
            'type_person_id' => [
                'type' => Type::nonNull(Type::id()),
                'rules' => ['required']
            ],
            'type_person_code' => [
                'type' => Type::string()
            ],
            'type_person_description' => [
                'type' => Type::string()
            ],
        ];
    }

    public function resolve($root, $args, SelectFields $fields, ResolveInfo $info)
    {
        $select = $fields->getSelect();
        $with = $fields->getRelations();

        if($data = TypePerson::select($select)->with($with)->find($args['type_person_id']))
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