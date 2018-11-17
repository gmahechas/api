<?php

namespace App\Modules\Features\A\City\GraphQL\Query;

use GraphQL;
use App\Modules\Features\A\City\Models\City;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;

class PaginationCity extends Query
{
    protected $attributes = [
        'name' => 'PaginationCity'
    ];

    public function type()
    {
        return GraphQL::paginate('City');
    }

    public function args()
    {
        return [
            'city_id' => [
                'type' => Type::id()
            ],
            'city_name' => [
                'type' => Type::string()
            ],
            'city_code' => [
                'type' => Type::string()
            ],
            'estate_id' => [
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

        $city_id = isset($args['city_id']) ? $args['city_id'] : false;
        $city_name = isset($args['city_name']) ? $args['city_name'] : false;
        $city_code = isset($args['city_code']) ? $args['city_code'] : false;
        $estate_id = isset($args['estate_id']) ? $args['estate_id'] : false;

        $limit = isset($args['limit']) ? $args['limit'] : config('app.page_limit');
        $page = isset($args['page']) ? $args['page'] : 1;
        
        return City::select($select)
                        ->when($city_id, function ($query) use ($city_id) {
                            return $query->where('city_id', '=', $city_id);
                        })
                        ->when($city_name, function ($query) use ($city_name) {
                            return $query->where('city_name', 'like', '%'.$city_name.'%');
                        })
                        ->when($city_code, function ($query) use ($city_code) {
                            return $query->where('city_code', 'like', '%'.$city_code.'%');
                        })
                        ->when($estate_id, function ($query) use ($estate_id) {
                            return $query->where('estate_id', '=', $estate_id);
                        })
                        ->with($with)
                        ->paginate($limit, ['*'], 'pages', $page);
    }
}