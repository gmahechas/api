<?php

namespace App\Modules\Features\B\OfficeDepartment\GraphQL\Mutation;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;
use App\Modules\Features\B\OfficeDepartment\Models\OfficeDepartment;

class DestroyOfficeDepartment extends Mutation
{
    protected $attributes = [
        'name' => 'DestroyOfficeDepartment'
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
            ]
        ];
    }

    public function resolve($root, $args, SelectFields $fields, ResolveInfo $info)
    {
        $select = $fields->getSelect();
        $with = $fields->getRelations();

        if($data = OfficeDepartment::select($select)->with($with)->find($args['office_department_id']))
        {
            $data_return = $data;
            $data->delete();
            return $data_return;
        } else {
            return null;
        }
    }
}