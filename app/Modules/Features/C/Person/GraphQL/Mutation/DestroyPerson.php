<?php

namespace App\Modules\Features\C\Person\GraphQL\Mutation;

use GraphQL;
use GraphQL\Type\Definition\Type;
use App\Modules\Features\C\Person\Models\Person;
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
            $data_return = $data;
            $data->delete();
            return $data_return;
        } else {
            return null;
        }
    }
}