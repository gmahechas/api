<?php

namespace App\Modules\Features\E\Context\GraphQL\Type;

use GraphQL;
use App\Modules\Shared\GraphQL\Field\DateField;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class ContextType extends GraphQLType
{
    protected $attributes = [
        'name' => 'ContextType',
        'model' => \App\Modules\Features\E\Context\Models\Context::class
    ];

    public function fields()
    {
        return [
            'context_id' => [
            	'type' => Type::id()
            ],
            'context_description' => [
            	'type' => Type::string()
            ],
            'context_created_at' => DateField::class,
            'context_updated_at' => DateField::class,
            'context_deleted_at' => DateField::class,
            'menu_id' => [
            	'type' => Type::id()
            ],
            /*In*/
            'menu' => [
            	'type' => GraphQL::type('Menu')
            ],
        ];
    }
}