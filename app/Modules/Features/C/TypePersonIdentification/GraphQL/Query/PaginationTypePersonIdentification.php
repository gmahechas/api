<?php

namespace App\Modules\Features\C\TypePersonIdentification\GraphQL\Query;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;
use App\Modules\Features\C\TypePersonIdentification\Models\TypePersonIdentification;

class PaginationTypePersonIdentification extends Query
{
    protected $attributes = [
        'name' => 'PaginationTypePersonIdentification'
    ];

    public function type()
    {
        return GraphQL::paginate('TypePersonIdentification');
    }

    public function args()
    {
        return [
            'type_person_identification_id' => [
                'type' => Type::id()
            ],
            'type_person_identification_description' => [
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

        $type_person_identification_id = isset($args['type_person_identification_id']) ? $args['type_person_identification_id'] : false;
        $type_person_identification_description = isset($args['type_person_identification_description']) ? $args['type_person_identification_description'] : false;

        $limit = isset($args['limit']) ? $args['limit'] : config('app.page_limit');
        $page = isset($args['page']) ? $args['page'] : 1;

        return TypePersonIdentification::select($select)
                        ->when($type_person_identification_id, function ($query) use ($type_person_identification_id) {
                            return $query->where('type_person_identification_id', '=', $type_person_identification_id);
                        })
                        ->when($type_person_identification_description, function ($query) use ($type_person_identification_description) {
                            return $query->where('type_person_identification_description', 'like', '%'.$type_person_identification_description.'%');
                        })
                        ->with($with)
                        ->paginate($limit, ['*'], 'pages', $page);
    }
}