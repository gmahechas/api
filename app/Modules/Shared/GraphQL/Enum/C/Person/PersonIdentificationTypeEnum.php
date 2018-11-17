<?php

namespace App\Modules\Shared\GraphQL\Enum\C\Person;

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