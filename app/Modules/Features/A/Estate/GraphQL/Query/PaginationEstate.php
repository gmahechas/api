<?php

namespace App\Modules\Features\A\Estate\GraphQL\Query;

use GraphQL;
use App\Modules\Features\A\Estate\Models\Estate;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;

class PaginationEstate extends Query
{
    protected $attributes = [
        'name' => 'PaginationEstate'
    ];

    public function type()
    {
        return GraphQL::paginate('Estate');
    }

    public function args()
    {
        return [
            'estate_id' => [
                'type' => Type::id()
            ],
            'estate_name' => [
                'type' => Type::string()
            ],
            'estate_code' => [
                'type' => Type::string()
            ],
            'country_id' => [
                'type' => Type::id()
            ],
            'limit' => [
                'type' => Type::int()
            ],
            'page' => [
                'type' => Type::int()
            ],
        ];
    }

    public function resolve($root, $args, SelectFields $fields, ResolveInfo $info)
    {
        $select = $fields->getSelect();
        $with = $fields->getRelations();

        $estate_id = isset($args['estate_id']) ? $args['estate_id'] : false;
        $estate_name = isset($args['estate_name']) ? $args['estate_name'] : false;
        $estate_code = isset($args['estate_code']) ? $args['estate_code'] : false;
        $country_id = isset($args['country_id']) ? $args['country_id'] : false;

        $limit = isset($args['limit']) ? $args['limit'] : config('app.page_limit');
        $page = isset($args['page']) ? $args['page'] : 1;

        return Estate::select($select)
                        ->when($estate_id, function ($query) use ($estate_id) {
                            return $query->where('estate_id', '=', $estate_id);
                        })
                        ->when($estate_name, function ($query) use ($estate_name) {
                            return $query->where('estate_name', 'like', '%'.$estate_name.'%');
                        })
                        ->when($estate_code, function ($query) use ($estate_code) {
                            return $query->where('estate_code', 'like', '%'.$estate_code.'%');
                        })
                        ->when($country_id, function ($query) use ($country_id) {
                            return $query->where('country_id', '=', $country_id);
                        })
                        ->with($with)
                        ->paginate($limit, ['*'], 'pages', $page);
    }
}