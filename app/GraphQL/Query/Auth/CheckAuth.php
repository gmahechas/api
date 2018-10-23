<?php

namespace App\GraphQL\Query\Auth;

use GraphQL;
use App\Models\One\Company;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use Illuminate\Support\Facades\Auth;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;

class CheckAuth extends Query
{
    protected $attributes = [
        'name' => 'CheckAuth',
    ];

    public function type()
    {
        return GraphQL::type('CheckAuth');
    }

    public function args()
    {
        return [

        ];
    }

    public function resolve($root, $args, SelectFields $fields, ResolveInfo $info)
    {
        $select = $fields->getSelect();
        $with = $fields->getRelations();

        return [
            'user' => Auth::user(),
            'company' => Company::with('city')->where('company_id', 1)->first()
        ];
    }
}