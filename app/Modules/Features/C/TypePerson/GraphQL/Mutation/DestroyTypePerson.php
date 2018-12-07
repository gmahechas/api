<?php

namespace App\Modules\Features\C\TypePerson\GraphQL\Mutation;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;
use App\Modules\Features\C\TypePerson\Models\TypePerson;

class DestroyTypePerson extends Mutation
{
    protected $attributes = [
        'name' => 'DestroyTypePerson'
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
            ]
        ];
    }

    public function resolve($root, $args, SelectFields $fields, ResolveInfo $info)
    {
        $select = $fields->getSelect();
        $with = $fields->getRelations();

        if($data = TypePerson::select($select)->with($with)->find($args['type_person_id']))
        {
            $data_return = $data;
            $data->delete();
            return $data_return;
        } else {
            return null;
        }
    }
}