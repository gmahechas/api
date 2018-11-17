<?php

namespace App\Modules\Features\B\Office\GraphQL\Query;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use App\Modules\Features\B\Office\Models\Office;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;

class PaginationOffice extends Query
{
    protected $attributes = [
        'name' => 'PaginationOffice',
        'description' => 'A query'
    ];

    public function type()
    {
        return GraphQL::paginate('Office');
    }

    public function args()
    {
        return [
            'office_id' => [
                'type' => Type::id()
            ],
            'office_name' => [
                'type' => Type::string()
            ],
            'city_id' => [
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

        $office_id = isset($args['office_id']) ? $args['office_id'] : false;
        $office_name = isset($args['office_name']) ? $args['office_name'] : false;
        $city_id = isset($args['city_id']) ? $args['city_id'] : false;
        
        $limit = isset($args['limit']) ? $args['limit'] : config('app.page_limit');
        $page = isset($args['page']) ? $args['page'] : 1;

        return Office::select($select)
                        ->when($office_id, function ($query) use ($office_id) {
                            return $query->where('office_id', '=', $office_id);
                        })
                        ->when($office_name, function ($query) use ($office_name) {
                            return $query->where('office_name', 'like', '%'.$office_name.'%');
                        })
                        ->when($city_id, function ($query) use ($city_id) {
                            return $query->where('city_id', '=', $city_id);
                        })
                        ->with($with)
                        ->paginate($limit, ['*'], 'pages', $page);
    }
}