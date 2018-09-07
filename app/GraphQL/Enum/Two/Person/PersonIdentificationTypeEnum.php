<?php

namespace App\GraphQL\Enum\Two\Person;


use Rebing\GraphQL\Support\Type as GraphQLType;

class PersonIdentificationTypeEnum extends GraphQLType {

    protected $enumObject = true;

    protected $attributes = [
        'name' => 'PersonIdentificationTypeEnum',
        'values' => [
            'CEDULA' => '1',
            'NIT' => '2'
        ],
    ];
    
}