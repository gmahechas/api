<?php

namespace App\Modules\Features\C\UserOffice\GraphQL\Mutation;

use GraphQL;
use App\Modules\Features\C\UserOffice\Models\UserOffice;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;

class DestroyUserOffice extends Mutation
{
    protected $attributes = [
        'name' => 'DestroyUserOffice',
    ];

    public function type()
    {
        return GraphQL::type('UserOffice');
    }

    public function args()
    {
        return [
            'user_office_id' => [
                'type' => Type::nonNull(Type::id()),
                'rules' => ['required']
            ]
        ];
    }

    public function resolve($root, $args, SelectFields $fields, ResolveInfo $info)
    {
        $select = $fields->getSelect();
        $with = $fields->getRelations();

        if($data = UserOffice::select($select)->with($with)->find($args['user_office_id']))
        {
            $data_return = $data;
            $data->delete();
            return $data_return;
        } else {
            return null;
        }
    }
}