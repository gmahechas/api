<?php

namespace App\GraphQL\Type\Two;

use GraphQL;
use App\GraphQL\Field\DateField;
use GraphQL\Type\Definition\Type;
use App\Models\Two\Person;
use Rebing\GraphQL\Support\Type as GraphQLType;

class PersonType extends GraphQLType
{
    protected $attributes = [
        'name' => 'PersonType',
        'model' => Person::class
    ];

    public function fields()
    {
        return [
            'person_id' => [
            	'type' => Type::id()
            ],
            'person_business_type' => [
            	'type' => GraphQL::type('PersonBusinessTypeEnum')
            ],
            'person_identification_type' => [
            	'type' => GraphQL::type('PersonIdentificationTypeEnum')
            ],
            'person_identification' => [
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
            'person_created_at' => DateField::class,
            'person_updated_at' => DateField::class,
            'person_deleted_at' => DateField::class,
            'city_id' => [
                'type' => Type::id()
            ],
            /*In*/
            'city' => [
                'type' => GraphQL::type('City')
            ],
            /*Out*/
            'users' => [
                'type' => Type::listOf(GraphQL::type('User'))
            ],
        ];
    }
}