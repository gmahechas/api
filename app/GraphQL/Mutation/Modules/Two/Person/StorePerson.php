<?php

namespace App\GraphQL\Mutation\Modules\Two\Person;

use GraphQL;
use GraphQL\Type\Definition\Type;
use App\Models\Modules\Two\Person;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;

class StorePerson extends Mutation
{
    protected $attributes = [
        'name' => 'StorePerson'
    ];

    public function type()
    {
        return GraphQL::type('Person');
    }

    public function args()
    {
        return [
            'person_business_type' => [
                'type' => Type::string(),
                'rules' => ['required']
            ],
            'person_identification_type' => [
                'type' => Type::string(),
                'rules' => ['required']
            ],
            'person_identification' => [
                'type' => Type::string(),
                'rules' => ['required']
            ],
            'person_first_name' => [
                'type' => Type::string(),
                'rules' => ['required']
            ],
            'person_second_name' => [
                'type' => Type::string()
            ],
            'person_first_surname' => [
                'type' => Type::string(),
                'rules' => ['required']
            ],
            'person_second_surname' => [
                'type' => Type::string()
            ],
            'city_id' => [
                'type' => Type::id(),
                'rules' => ['required']
            ],
        ];
    }

    public function resolve($root, $args, SelectFields $fields, ResolveInfo $info)
    {
        return Person::create($args);
    }
}