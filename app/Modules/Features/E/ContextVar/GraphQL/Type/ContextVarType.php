<?php

namespace App\Modules\Features\E\ContextVar\GraphQL\Type;

use GraphQL;
use App\Modules\Shared\GraphQL\Field\DateField;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class ContextVarType extends GraphQLType
{
    protected $attributes = [
        'name' => 'ContextVarType',
        'model' => \App\Modules\Features\E\ContextVar\Models\ContextVar::class
    ];

    public function fields()
    {
        return [
            'context_var_id' => [
            	'type' => Type::id()
            ],
            'context_var_code' => [
            	'type' => Type::string()
            ],
            'context_var_type' => [
            	'type' => Type::string()
            ],
            'context_var_description' => [
            	'type' => Type::string()
            ],
            'context_var_order' => [
            	'type' => Type::string()
            ],
            /*In*/
            'context_id' => [
            	'type' => Type::id()
            ],
            'context' => [
                'type' => GraphQL::type('Context')
            ],
            'context_var_created_at' => DateField::class,
            'context_var_updated_at' => DateField::class,
            'context_var_deleted_at' => DateField::class,
        ];
    }
}