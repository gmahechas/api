<?php

namespace App\Modules\Features\C\TypePerson\GraphQL\Mutation;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;
use App\Modules\Features\C\TypePerson\Models\TypePerson;

class StoreTypePerson extends Mutation
{
    protected $attributes = [
        'name' => 'StoreTypePerson'
    ];

    public function type()
    {
        return GraphQL::type('TypePerson');
    }

    public function args()
    {
        return [
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
        return TypePerson::create($args);
    }
}