<?php

namespace App\Modules\Features\B\OfficeDepartment\GraphQL\Mutation;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;
use App\Modules\Features\B\OfficeDepartment\Models\OfficeDepartment;

class UpdateOfficeDepartment extends Mutation
{
    protected $attributes = [
        'name' => 'UpdateOfficeDepartment'
    ];

    public function type()
    {
        return GraphQL::type('OfficeDepartment');
    }

    public function args()
    {
        return [
            'office_department_id' => [
                'type' => Type::nonNull(Type::id()),
                'rules' => ['required']
            ],
            'office_department_status' => [
                'type' => Type::boolean()
            ]
        ];
    }

    public function resolve($root, $args, SelectFields $fields, ResolveInfo $info)
    {
        $select = $fields->getSelect();
        $with = $fields->getRelations();

        if($data = OfficeDepartment::select($select)->with($with)->find($args['office_department_id']))
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