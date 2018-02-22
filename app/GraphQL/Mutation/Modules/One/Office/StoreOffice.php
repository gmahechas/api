<?php

namespace App\GraphQL\Mutation\Modules\One\Office;

use GraphQL;
use GraphQL\Type\Definition\Type;
use App\Models\Modules\One\Office;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;

class StoreOffice extends Mutation
{
    protected $attributes = [
        'name' => 'StoreOffice'
    ];

    public function type()
    {
        return GraphQL::type('Office');
    }

    public function args()
    {
        return [
            'office_name' => [
                'type' => Type::string(),
                'rules' => ['required']
            ],
            'company_id' => [
                'type' => Type::id(),
                'rules' => ['required']
            ],
            'city_id' => [
                'type' => Type::id(),
                'rules' => ['required']
            ]
        ];
    }

    public function resolve($root, $args, SelectFields $fields, ResolveInfo $info)
    {
        return Office::create($args);
    }
}