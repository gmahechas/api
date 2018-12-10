<?php

namespace App\Modules\Features\C\TypePersonIdentification\GraphQL\Mutation;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;
use App\Modules\Features\C\TypePersonIdentification\Models\TypePersonIdentification;

class StoreTypePersonIdentification extends Mutation
{
    protected $attributes = [
        'name' => 'StoreTypePersonIdentification'
    ];

    public function type()
    {
        return GraphQL::type('TypePersonIdentification');
    }

    public function args()
    {
        return [
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
        return TypePersonIdentification::create($args);
    }
}