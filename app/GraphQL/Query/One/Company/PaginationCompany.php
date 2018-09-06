<?php

namespace App\GraphQL\Query\One\Company;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use App\Models\One\Company;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;

class PaginationCompany extends Query
{
    protected $attributes = [
        'name' => 'PaginationCompany',
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

        $limit = isset($args['limit']) ? $args['limit'] : config('app.page_limit');
        $page = isset($args['page']) ? $args['page'] : 1;

        return Company::select($select)
                        ->with($with)
                        ->paginate($limit, ['*'], 'pages', $page);
    }
}