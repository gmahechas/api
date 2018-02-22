<?php

namespace App\GraphQL\Query\Modules\One\Company;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use App\Models\Modules\One\Company;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;

class ShowCompany extends Query
{
    protected $attributes = [
        'name' => 'ShowCompany',
    ];

    public function type()
    {
        return GraphQL::paginate('Company');
    }

    public function args()
    {
        return [

        ];
    }

    public function resolve($root, $args, SelectFields $fields, ResolveInfo $info)
    {
        $select = $fields->getSelect();
        $with = $fields->getRelations();

        $limit = isset($args['limit']) ? $args['limit'] : 10000;
        $page = isset($args['page']) ? $args['page'] : 1;

        return Company::select($select)
                        ->with($with)
                        ->paginate($limit, ['*'], 'pages', $page);
    }
}