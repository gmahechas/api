<?php

namespace App\Modules\Features\C\User\GraphQL\Mutation;

use GraphQL;
use App\Modules\Features\C\User\Models\User;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;

class DestroyUser extends Mutation
{
    protected $attributes = [
        'name' => 'DestroyUser'
    ];

    public function type()
    {
        return GraphQL::type('User');
    }

    public function args()
    {
        return [
            'user_id' => [
                'type' => Type::nonNull(Type::id()),
                'rules' => ['required']
            ],
        ];
    }

    public function resolve($root, $args, SelectFields $fields, ResolveInfo $info)
    {
        $select = $fields->getSelect();
        $with = $fields->getRelations();

        if($data = User::select($select)->with($with)->find($args['user_id']))
        {
            $data_return = $data;
            $data->delete();
            return $data_return;
        } else {
            return null;
        }
    }
}