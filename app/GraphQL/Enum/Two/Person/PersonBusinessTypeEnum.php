<?php

namespace App\GraphQL\Enum\Two\Person;

use Rebing\GraphQL\Support\Type as GraphQLType;

class PersonBusinessTypeEnum extends GraphQLType {

    protected $enumObject = true;

    protected $attributes = [
        'name' => 'PersonBusinessTypeEnum',
        'values' => [
            'NATURAL' => '1',
            'JURIDICA' => '2'
        ],
    ];
    
}