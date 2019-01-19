<?php

namespace App\Modules\Features\C\User\GraphQL\Mutation;

use GraphQL;
use App\Modules\Features\C\User\Models\User;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;

class StoreUser extends Mutation
{
    protected $attributes = [
        'name' => 'StoreUser'
    ];

    public function type()
    {
        return GraphQL::type('User');
    }

    public function args()
    {
        return [
            'username' => [
                'type' => Type::string(),
                'rules' => ['required']
            ],
            'password' => [
                'type' => Type::string(),
                'rules' => ['required']
            ],
            'person_id' => [
                'type' => Type::id(),
            ],
            'profile_id' => [
                'type' => Type::id(),
            ],
        ];
    }

    public function resolve($root, $args, SelectFields $fields, ResolveInfo $info)
    {
        $args['password'] = bcrypt($args['password']);
        return User::create($args);
    }
}