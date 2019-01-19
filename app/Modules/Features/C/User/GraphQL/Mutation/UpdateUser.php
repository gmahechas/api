<?php

namespace App\Modules\Features\C\User\GraphQL\Mutation;

use GraphQL;
use App\Modules\Features\C\User\Models\User;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;

class UpdateUser extends Mutation
{
    protected $attributes = [
        'name' => 'UpdateUser'
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
            'username' => [
                'type' => Type::string()
            ],
            'password' => [
                'type' => Type::string()
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
        $select = $fields->getSelect();
        $with = $fields->getRelations();

        if($data = User::select($select)->with($with)->find($args['user_id']))
        {
            foreach($args as $key => $value)
            {
                if($data->{$key} != $value)
                {
                    $data->{$key} = $value;
                }
            }

            if($data->isDirty())
            {
                $data->save();
                return $data->refresh();
            } else {
                return null;
            }

        } else {
            return null;
        }
    }
}