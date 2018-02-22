<?php

namespace App\GraphQL\Mutation\Modules\Two\Profile;

use GraphQL;
use GraphQL\Type\Definition\Type;
use App\Models\Modules\Two\Profile;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;

class DestroyProfile extends Mutation
{
    protected $attributes = [
        'name' => 'DestroyProfile'
    ];

    public function type()
    {
        return GraphQL::type('Profile');
    }

    public function args()
    {
        return [
            'profile_id' => [
                'type' => Type::nonNull(Type::id()),
                'rules' => ['required']
            ],
        ];
    }

    public function resolve($root, $args, SelectFields $fields, ResolveInfo $info)
    {
        $select = $fields->getSelect();
        $with = $fields->getRelations();

        if($data = Profile::select($select)->with($with)->find($args['profile_id']))
        {
            return $data->delete();
        } else {
            return null;
        }
    }
}