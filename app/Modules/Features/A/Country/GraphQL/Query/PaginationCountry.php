<?php

namespace App\Modules\Features\A\Country\GraphQL\Query;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use App\Modules\Features\A\Country\Models\Country;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;

class PaginationCountry extends Query
{
    protected $attributes = [
        'name' => 'PaginationCountry'
    ];

    public function type()
    {
        return GraphQL::paginate('Country');
    }

    public function args()
    {
        return [
            'country_id' => [
                'type' => Type::id()
            ],
            'country_name' => [
                'type' => Type::string()
            ],
            'country_code' => [
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

        $country_id = isset($args['country_id']) ? $args['country_id'] : false;
        $country_name = isset($args['country_name']) ? $args['country_name'] : false;
        $country_code = isset($args['country_code']) ? $args['country_code'] : false;
        
        $limit = isset($args['limit']) ? $args['limit'] : config('app.page_limit');
        $page = isset($args['page']) ? $args['page'] : 1;

        // sleep(3);

        return Country::select($select)
                        ->when($country_id, function ($query) use ($country_id) {
                            return $query->where('country_id', '=', $country_id);
                        })
                        ->when($country_name, function ($query) use ($country_name) {
                            return $query->where('country_name', 'like', '%'.$country_name.'%');
                        })
                        ->when($country_code, function ($query) use ($country_code) {
                            return $query->where('country_code', 'like', '%'.$country_code.'%');
                        })
                        ->with($with)
                        ->paginate($limit, ['*'], 'pages', $page);
    }
}