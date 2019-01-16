<?php

namespace App\Modules\Features\C\UserOffice\GraphQL\Type;

use GraphQL;
use App\Modules\Shared\GraphQL\Field\DateField;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class UserOfficeType extends GraphQLType
{
    protected $attributes = [
        'name' => 'UserOfficeType',
        'model' => \App\Modules\Features\C\UserOffice\Models\UserOffice::class
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
            /*In*/
            'user_id' => [
                'type' => Type::id()
            ],
            'user' => [
                'type' => GraphQL::type('User')
            ],
            'office_id' => [
                'type' => Type::id()
            ],
            'office' => [
                'type' => GraphQL::type('Office')
            ],
            'user_office_created_at' => DateField::class,
            'user_office_updated_at' => DateField::class,
            'user_office_deleted_at' => DateField::class,
        ];
    }
}