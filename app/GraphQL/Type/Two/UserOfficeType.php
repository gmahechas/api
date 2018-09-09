<?php

namespace App\GraphQL\Type\Two;

use GraphQL;
use App\Models\Two\UserOffice;
use App\GraphQL\Field\DateField;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class UserOfficeType extends GraphQLType
{
    protected $attributes = [
        'name' => 'UserOfficeType',
        'model' => UserOffice::class
    ];

    public function fields()
    {
        return [
            'user_office_id' => [
            	'type' => Type::id()
            ],
            'user_office_status' => [
            	'type' => Type::boolean()
            ],
            'user_office_created_at' => DateField::class,
            'user_office_updated_at' => DateField::class,
            'user_office_deleted_at' => DateField::class,
            'user_id' => [
                'type' => Type::id()
            ],
            'office_id' => [
                'type' => Type::id()
            ],
            /*In*/
            'user' => [
                'type' => GraphQL::type('User')
            ],
            'office' => [
                'type' => GraphQL::type('Office')
            ],
        ];
    }
}