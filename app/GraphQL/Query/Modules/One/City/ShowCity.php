<?php

namespace App\GraphQL\Query\Modules\One\City;

use GraphQL;
use App\Models\Modules\One\City;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;

class ShowCity extends Query
{
    protected $attributes = [
        'name' => 'ShowCity'
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
            'state_id' => [
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
        $state_id = isset($args['state_id']) ? $args['state_id'] : false;

        $limit = isset($args['limit']) ? $args['limit'] : 10000;
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
                        ->when($state_id, function ($query) use ($state_id) {
                            return $query->where('state_id', '=', $state_id);
                        })
                        ->with($with)
                        ->paginate($limit, ['*'], 'pages', $page);
    }
}