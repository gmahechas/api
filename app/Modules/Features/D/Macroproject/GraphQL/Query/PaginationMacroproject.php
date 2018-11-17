<?php

namespace App\Modules\Features\D\Macroproject\GraphQL\Query;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;
use App\Modules\Features\D\Macroproject\Models\Macroproject;

class PaginationMacroproject extends Query
{
    protected $attributes = [
        'name' => 'PaginationMacroproject'
    ];

    public function type()
    {
        return GraphQL::paginate('Macroproject');
    }

    public function args()
    {
        return [
            'macroproject_id' => [
                'type' => Type::id()
            ],
            'macroproject_name' => [
                'type' => Type::string()
            ],
            'city_id' => [
                'type' => Type::id()
            ],
            'office_id' => [
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

        $macroproject_id = isset($args['macroproject_id']) ? $args['macroproject_id'] : false;
        $macroproject_name = isset($args['macroproject_name']) ? $args['macroproject_name'] : false;
        $city_id = isset($args['city_id']) ? $args['city_id'] : false;
        $office_id = isset($args['office_id']) ? $args['office_id'] : false;
        
        $limit = isset($args['limit']) ? $args['limit'] : config('app.page_limit');
        $page = isset($args['page']) ? $args['page'] : 1;

        return Macroproject::select($select)
                        ->when($macroproject_id, function ($query) use ($macroproject_id) {
                            return $query->where('macroproject_id', '=', $macroproject_id);
                        })
                        ->when($macroproject_name, function ($query) use ($macroproject_name) {
                            return $query->where('macroproject_name', 'like', '%'.$macroproject_name.'%');
                        })
                        ->when($city_id, function ($query) use ($city_id) {
                            return $query->where('city_id', '=', $city_id);
                        })
                        ->when($office_id, function ($query) use ($office_id) {
                            return $query->where('office_id', '=', $office_id);
                        })
                        ->with($with)
                        ->paginate($limit, ['*'], 'pages', $page);
    }
}