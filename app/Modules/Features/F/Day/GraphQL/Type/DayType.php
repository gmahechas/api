<?php

namespace App\Modules\Features\F\Day\GraphQL\Type;

use GraphQL;
use App\Modules\Shared\GraphQL\Field\DateField;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class DayType extends GraphQLType
{
    protected $attributes = [
        'name' => 'DayType',
        'model' => \App\Modules\Features\F\Day\Models\Day::class
    ];

    public function fields()
    {
        return [
            'day_id' => [
            	'type' => Type::id()
            ],
            'day_code' => [
            	'type' => Type::string()
            ],
            'day_name' => [
            	'type' => Type::string()
            ],
            'day_created_at' => DateField::class,
            'day_updated_at' => DateField::class,
            'day_deleted_at' => DateField::class,
        ];
    }
}