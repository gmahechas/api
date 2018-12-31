<?php

namespace App\Modules\Features\C\Person\GraphQL\Query;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;
use App\Modules\Features\C\Person\Models\Person;

class PaginationPerson extends Query
{
    protected $attributes = [
        'name' => 'PaginationPerson'
    ];

    public function type()
    {
        return GraphQL::paginate('Person');
    }

    public function args()
    {
        return [
            'person_id' => [
                'type' => Type::id()
            ],
            'person_identification' => [
                'type' => Type::string()
            ],
            'person_names' => [
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

        $person_id = isset($args['person_id']) ? $args['person_id'] : false;
        $person_identification = isset($args['person_identification']) ? $args['person_identification'] : false;
        $person_names = isset($args['person_names']) ? $args['person_names'] : false;

        $limit = isset($args['limit']) ? $args['limit'] : config('app.page_limit');
        $page = isset($args['page']) ? $args['page'] : 1;

        return Person::select($select)
                        ->when($person_id, function ($query) use ($person_id) {
                            return $query->where('person_id', '=', $person_id);
                        })
                        ->when($person_identification, function ($query) use ($person_identification) {
                            return $query->where('person_identification', '=', $person_identification);
                        })
                        ->when($person_names, function ($query) use ($person_names) {
                            return $query->where('person_first_name', 'like', '%'.$person_names.'%')
                                         ->orWhere('person_second_name', 'like', '%'.$person_names.'%')
                                         ->orWhere('person_first_surname', 'like', '%'.$person_names.'%')
                                         ->orWhere('person_second_surname', 'like', '%'.$person_names.'%')
                                         ->orWhere('person_legal_name', 'like', '%'.$person_names.'%');
                        })
                        ->with($with)
                        ->paginate($limit, ['*'], 'pages', $page);
    }
}