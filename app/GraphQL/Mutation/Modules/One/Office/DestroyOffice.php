<?php

namespace App\GraphQL\Mutation\Modules\One\Office;

use GraphQL;
use GraphQL\Type\Definition\Type;
use App\Models\Modules\One\Office;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;

class DestroyOffice extends Mutation
{
    protected $attributes = [
        'name' => 'DestroyOffice'
    ];

    public function type()
    {
        return GraphQL::type('Office');
    }

    public function args()
    {
        return [
            'office_id' => [
                'type' => Type::nonNull(Type::id()),
                'rules' => ['required']
            ],
        ];
    }

    public function resolve($root, $args, SelectFields $fields, ResolveInfo $info)
    {
        $select = $fields->getSelect();
        $with = $fields->getRelations();

        if($data = Office::select($select)->with($with)->find($args['office_id']))
        {
            return $data->delete();
        } else {
            return null;
        }
    }
}