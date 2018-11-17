<?php

namespace App\Modules\Features\D\Macroproject\GraphQL\Mutation;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;
use App\Modules\Features\D\Macroproject\Models\Macroproject;

class StoreMacroproject extends Mutation
{
    protected $attributes = [
        'name' => 'StoreMacroproject'
    ];

    public function type()
    {
        return GraphQL::type('Macroproject');
    }

    public function args()
    {
        return [
            'macroproject_name' => [
                'type' => Type::string(),
                'rules' => ['required']
            ],
            'macroproject_address' => [
                'type' => Type::string(),
                'rules' => ['required']
            ],
            'macroproject_phone' => [
                'type' => Type::string(),
                'rules' => ['required']
            ],
            'city_id' => [
                'type' => Type::id(),
                'rules' => ['required']
            ],
            'office_id' => [
                'type' => Type::id(),
                'rules' => ['required']
            ]
        ];
    }

    public function resolve($root, $args, SelectFields $fields, ResolveInfo $info)
    {
        return Macroproject::create($args);
    }
}