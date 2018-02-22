<?php

namespace App\GraphQL\Mutation\Modules\Two\Person;

use GraphQL;
use GraphQL\Type\Definition\Type;
use App\Models\Modules\Two\Person;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;

class DestroyPerson extends Mutation
{
    protected $attributes = [
        'name' => 'DestroyPerson'
    ];

    public function type()
    {
        return GraphQL::type('Person');
    }

    public function args()
    {
        return [
            'person_id' => [
                'type' => Type::nonNull(Type::id()),
                'rules' => ['required']
            ],
        ];
    }

    public function resolve($root, $args, SelectFields $fields, ResolveInfo $info)
    {
        $select = $fields->getSelect();
        $with = $fields->getRelations();

        if($data = Person::select($select)->with($with)->find($args['person_id']))
        {
            return $data->delete();
        } else {
            return null;
        }
    }
}