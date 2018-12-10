<?php

namespace App\Modules\Features\C\TypePersonIdentification\GraphQL\Mutation;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;
use App\Modules\Features\C\TypePersonIdentification\Models\TypePersonIdentification;

class DestroyTypePersonIdentification extends Mutation
{
    protected $attributes = [
        'name' => 'DestroyTypePersonIdentification'
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
            ]
        ];
    }

    public function resolve($root, $args, SelectFields $fields, ResolveInfo $info)
    {
        $select = $fields->getSelect();
        $with = $fields->getRelations();

        if($data = TypePersonIdentification::select($select)->with($with)->find($args['type_person_identification_id']))
        {
            $data_return = $data;
            $data->delete();
            return $data_return;
        } else {
            return null;
        }
    }
}