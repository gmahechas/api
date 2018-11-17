<?php

namespace App\Modules\Features\C\ProfileMenu\GraphQL\Mutation;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use App\Modules\Features\C\ProfileMenu\Models\ProfileMenu;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;

class UpdateProfileMenu extends Mutation
{
    protected $attributes = [
        'name' => 'UpdateProfileMenu'
    ];

    public function type()
    {
        return GraphQL::type('ProfileMenu');
    }

    public function args()
    {
        return [
            'profile_menu_id' => [
                'type' => Type::nonNull(Type::id()),
                'rules' => ['required']
            ],
            'profile_menu_status' => [
                'type' => Type::string(),
                'rules' => ['required']
            ],
        ];
    }

    public function resolve($root, $args, SelectFields $fields, ResolveInfo $info)
    {
        $select = $fields->getSelect();
        $with = $fields->getRelations();

        if($data = ProfileMenu::select($select)->with($with)->find($args['profile_menu_id']))
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