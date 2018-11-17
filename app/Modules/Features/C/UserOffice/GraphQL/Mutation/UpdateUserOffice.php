<?php

namespace App\Modules\Features\C\UserOffice\GraphQL\Mutation;

use GraphQL;
use App\Modules\Features\C\UserOffice\Models\UserOffice;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;

class UpdateUserOffice extends Mutation
{
    protected $attributes = [
        'name' => 'UpdateUserOffice'
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
            ],
            'user_office_status' => [
                'type' => Type::boolean()
            ]
        ];
    }

    public function resolve($root, $args, SelectFields $fields, ResolveInfo $info)
    {
        $select = $fields->getSelect();
        $with = $fields->getRelations();

        if($data = UserOffice::select($select)->with($with)->find($args['user_office_id']))
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