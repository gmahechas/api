<?php

namespace App\Modules\Features\C\TypePersonIdentification\GraphQL\Type;

use GraphQL;
use App\Modules\Shared\GraphQL\Field\DateField;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class TypePersonIdentificationType extends GraphQLType
{
    protected $attributes = [
        'name' => 'TypePersonIdentificationType',
        'model' => \App\Modules\Features\C\TypePersonIdentification\Models\TypePersonIdentification::class
    ];

    public function fields()
    {
        return [
            'type_person_identification_id' => [
            	'type' => Type::id()
            ],
            'type_person_identification_code' => [
            	'type' => Type::string()
            ],
            'type_person_identification_description' => [
            	'type' => Type::string()
            ],
            'type_person_identification_created_at' => DateField::class,
            'type_person_identification_updated_at' => DateField::class,
            'type_person_identification_deleted_at' => DateField::class,
        ];
    }
}