<?php

namespace App\Modules\Features\D\Macroproject\GraphQL\Mutation;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;
use App\Modules\Features\D\Macroproject\Models\Macroproject;

class DestroyMacroproject extends Mutation
{
    protected $attributes = [
        'name' => 'DestroyMacroproject'
    ];

    public function type()
    {
        return GraphQL::type('Macroproject');
    }

    public function args()
    {
        return [
            'macroproject_id' => [
                'type' => Type::nonNull(Type::id()),
                'rules' => ['required']
            ],
        ];
    }

    public function resolve($root, $args, SelectFields $fields, ResolveInfo $info)
    {
        $select = $fields->getSelect();
        $with = $fields->getRelations();

        if($data = Macroproject::select($select)->with($with)->find($args['macroproject_id']))
        {
            $data_return = $data;
            $data->delete();
            return $data_return;
        } else {
            return null;
        }
    }
}