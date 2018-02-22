<?php

namespace App\GraphQL\Query\Modules\One\State;

use GraphQL;
use App\Models\Modules\One\State;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;

class ShowState extends Query
{
    protected $attributes = [
        'name' => 'ShowState'
    ];

    public function type()
    {
        return GraphQL::paginate('State');
    }

    public function args()
    {
        return [
            'state_id' => [
                'type' => Type::id()
            ],
            'state_name' => [
                'type' => Type::string()
            ],
            'state_code' => [
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

        $state_id = isset($args['state_id']) ? $args['state_id'] : false;
        $state_name = isset($args['state_name']) ? $args['state_name'] : false;
        $state_code = isset($args['state_code']) ? $args['state_code'] : false;
        $country_id = isset($args['country_id']) ? $args['country_id'] : false;

        $limit = isset($args['limit']) ? $args['limit'] : 10000;
        $page = isset($args['page']) ? $args['page'] : 1;

        return State::select($select)
                        ->when($state_id, function ($query) use ($state_id) {
                            return $query->where('state_id', '=', $state_id);
                        })
                        ->when($state_name, function ($query) use ($state_name) {
                            return $query->where('state_name', 'like', '%'.$state_name.'%');
                        })
                        ->when($state_code, function ($query) use ($state_code) {
                            return $query->where('state_code', 'like', '%'.$state_code.'%');
                        })
                        ->when($country_id, function ($query) use ($country_id) {
                            return $query->where('country_id', '=', $country_id);
                        })
                        ->with($with)
                        ->paginate($limit, ['*'], 'pages', $page);
    }
}