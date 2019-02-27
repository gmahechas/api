<?php

namespace App\Modules\Features\C\UserOffice\GraphQL\Mutation;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;
use App\Modules\Features\C\UserOffice\Models\UserOffice;

class StoreUserOffice extends Mutation
{
    protected $attributes = [
        'name' => 'StoreUserOffice'
    ];

    public function type()
    {
        return GraphQL::type('UserOffice');
    }

    public function args()
    {
        return [
            'user_office_status' => [
                'type' => Type::boolean(),
                'rules' => ['required']
            ],
            'user_id' => [
                'type' => Type::id(),
                'rules' => ['required']
            ],
            'office_id' => [
                'type' => Type::id(),
                'rules' => ['required']
            ],
        ];
    }

    public function resolve($root, $args, SelectFields $fields, ResolveInfo $info)
    {
        return UserOffice::create($args);
    }
}