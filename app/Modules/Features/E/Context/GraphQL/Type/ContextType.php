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
            /*In*/
            'menu_id' => [
            	'type' => Type::id()
            ],
            'menu' => [
            	'type' => GraphQL::type('Menu')
            ],
            'context_created_at' => DateField::class,
            'context_updated_at' => DateField::class,
            'context_deleted_at' => DateField::class,
            /*Out*/
            'context_vars' => [
                'type' => Type::listOf(GraphQL::type('ContextVar'))
            ],
        ];
    }
}