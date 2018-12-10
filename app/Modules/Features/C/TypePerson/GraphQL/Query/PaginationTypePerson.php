<?php

namespace App\Modules\Features\C\TypePerson\GraphQL\Query;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;
use App\Modules\Features\C\TypePerson\Models\TypePerson;

class PaginationTypePerson extends Query
{
    protected $attributes = [
        'name' => 'PaginationTypePerson'
    ];

    public function type()
    {
        return GraphQL::paginate('TypePerson');
    }

    public function args()
    {
        return [
            'type_person_id' => [
                'type' => Type::id()
            ],
            'type_person_description' => [
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

        $type_person_id = isset($args['type_person_id']) ? $args['type_person_id'] : false;
        $type_person_description = isset($args['type_person_description']) ? $args['type_person_description'] : false;


        $limit = isset($args['limit']) ? $args['limit'] : config('app.page_limit');
        $page = isset($args['page']) ? $args['page'] : 1;

        return TypePerson::select($select)
                        ->when($type_person_id, function ($query) use ($type_person_id) {
                            return $query->where('type_person_id', '=', $type_person_id);
                        })
                        ->when($type_person_description, function ($query) use ($type_person_description) {
                            return $query->where('type_person_description', 'like', '%'.$type_person_description.'%');
                        })
                        ->with($with)
                        ->paginate($limit, ['*'], 'pages', $page);
    }
}