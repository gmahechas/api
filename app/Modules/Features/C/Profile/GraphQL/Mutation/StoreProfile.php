<?php

namespace App\Modules\Features\C\Profile\GraphQL\Mutation;

use GraphQL;
use GraphQL\Type\Definition\Type;
use App\Modules\Features\C\Profile\Models\Profile;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;

class StoreProfile extends Mutation
{
    protected $attributes = [
        'name' => 'StoreProfile'
    ];

    public function type()
    {
        return GraphQL::type('Profile');
    }

    public function args()
    {
        return [
            'profile_name' => [
                'type' => Type::string(),
                'rules' => ['required']
            ]
        ];
    }

    public function resolve($root, $args, SelectFields $fields, ResolveInfo $info)
    {
        return Profile::create($args);
    }
}