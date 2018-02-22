<?php

namespace App\GraphQL\Query\Modules\One\Office;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use App\Models\Modules\One\Office;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;

class ShowOffice extends Query
{
    protected $attributes = [
        'name' => 'ShowOffice',
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
                'type' => Type::int()
            ],
            'office_name' => [
                'type' => Type::string()
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
        
        $limit = isset($args['limit']) ? $args['limit'] : 10000;
        $page = isset($args['page']) ? $args['page'] : 1;

        return Office::select($select)
                        ->when($office_id, function ($query) use ($office_id) {
                            return $query->where('office_id', '=', $office_id);
                        })
                        ->when($office_name, function ($query) use ($office_name) {
                            return $query->where('office_name', 'like', '%'.$office_name.'%');
                        })
                        ->with($with)
                        ->paginate($limit, ['*'], 'pages', $page);
    }
}