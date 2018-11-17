<?php

namespace App\Modules\Features\C\Profile\GraphQL\Mutation;

use GraphQL;
use GraphQL\Type\Definition\Type;
use App\Modules\Features\C\Profile\Models\Profile;
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
            $data_return = $data;
            $data->delete();
            return $data_return;
        } else {
            return null;
        }
    }
}