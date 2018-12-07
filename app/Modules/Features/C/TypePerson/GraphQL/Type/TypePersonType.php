<?php

namespace App\Modules\Features\C\TypePerson\GraphQL\Type;

use GraphQL;
use App\Modules\Shared\GraphQL\Field\DateField;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class TypePersonType extends GraphQLType
{
    protected $attributes = [
        'name' => 'TypePersonType',
        'model' => \App\Modules\Features\C\TypePerson\Models\TypePerson::class
    ];

    public function fields()
    {
        return [
            'type_person_id' => [
            	'type' => Type::id()
            ],
            'type_person_code' => [
            	'type' => Type::string()
            ],
            'type_person_description' => [
            	'type' => Type::string()
            ],
            'type_person_created_at' => DateField::class,
            'type_person_updated_at' => DateField::class,
            'type_person_deleted_at' => DateField::class,
        ];
    }
}