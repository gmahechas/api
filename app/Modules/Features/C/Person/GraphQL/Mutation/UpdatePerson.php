<?php

namespace App\Modules\Features\C\Person\GraphQL\Mutation;

use GraphQL;
use GraphQL\Type\Definition\Type;
use App\Modules\Features\C\Person\Models\Person;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;

class UpdatePerson extends Mutation
{
    protected $attributes = [
        'name' => 'UpdatePerson'
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
            'person_identification' => [
                'type' => Type::string()
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
                'type' => Type::id()
            ],
            'type_person_identification_id' => [
                'type' => Type::id()
            ],
            'city_issue_id' => [
                'type' => Type::id()
            ],
            'city_location_id' => [
                'type' => Type::id()
            ],
        ];
    }

    public function resolve($root, $args, SelectFields $fields, ResolveInfo $info)
    {
        $select = $fields->getSelect();
        $with = $fields->getRelations();

        if($data = Person::select($select)->with($with)->find($args['person_id']))
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