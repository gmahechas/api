<?php

namespace App\Modules\Features\C\Person\GraphQL\Query;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;
use App\Modules\Features\C\Person\Models\Person;

class CheckIdentificationPerson extends Query
{
    protected $attributes = [
        'name' => 'CheckIdentificationPerson',
    ];

    public function type()
    {
        return Type::boolean();
    }

    public function args()
    {
        return [
            'person_identification' => [
                'type' => Type::string()
            ],
        ];
    }

    public function resolve($root, $args, SelectFields $fields, ResolveInfo $info)
    {
        if($data = Person::where('person_identification', '=', $args['person_identification'])->first()) {
            return true;
        } else {
            return false;
        }
    }
}