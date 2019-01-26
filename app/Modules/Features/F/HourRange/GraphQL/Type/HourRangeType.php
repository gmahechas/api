<?php

namespace App\Modules\Features\F\HourRange\GraphQL\Type;

use GraphQL;
use App\Modules\Shared\GraphQL\Field\DateField;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class HourRangeType extends GraphQLType
{
    protected $attributes = [
        'name' => 'HourRangeType',
        'model' => \App\Modules\Features\F\HourRange\Models\HourRange::class
    ];

    public function fields()
    {
        return [
            'hour_range_id' => [
            	'type' => Type::id()
            ],
            'hour_range_name' => [
            	'type' => Type::string()
            ],
            'hour_range_description' => [
            	'type' => Type::string()
            ],
            'hour_range_start' => [
            	'type' => Type::string()
            ],
            'hour_range_end' => [
            	'type' => Type::string()
            ],
            'hour_range_created_at' => DateField::class,
            'hour_range_updated_at' => DateField::class,
            'hour_range_deleted_at' => DateField::class,
        ];
    }
}