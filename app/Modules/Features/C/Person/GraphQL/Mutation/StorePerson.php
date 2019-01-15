<?php

namespace App\Modules\Features\C\Person\GraphQL\Mutation;

use GraphQL;
use GraphQL\Type\Definition\Type;
use App\Modules\Features\C\Person\Models\Person;
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
            'person_identification' => [
                'type' => Type::string(),
                'rules' => ['required']
            ],
            'person_identification_date_issue' => [
                'type' => Type::string()
            ],
            'person_first_name' => [
                'type' => Type::string()
            ],
            'person_second_name' => [
                'type' => Type::string()
            ],
            'person_first_surname' => [
                'type' => Type::string()
            ],
            'person_second_surname' => [
                'type' => Type::string()
            ],
            'person_legal_name' => [
                'type' => Type::string()
            ],
            'person_address' => [
                'type' => Type::string()
            ],
            'person_email' => [
                'type' => Type::string()
            ],
            'person_phone' => [
                'type' => Type::string()
            ],
            'type_person_id' => [
                'type' => Type::id(),
                'rules' => ['required']
            ],
            'type_person_identification_id' => [
                'type' => Type::id(),
                'rules' => ['required']
            ],
            'city_issue_id' => [
                'type' => Type::id(),
                'rules' => ['required']
            ],
            'city_location_id' => [
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