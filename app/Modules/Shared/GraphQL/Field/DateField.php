<?php

namespace App\Modules\Shared\GraphQL\Field;

use Carbon\Carbon;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Field;
use GraphQL\Type\Definition\ResolveInfo;

class DateField extends Field
{
	protected $attributes = [
    	'description' => 'A date'
    ];

    public function type(){
        return Type::string();
    }

    public function args()
    {
        return [
        	'format' => [
                'type' => Type::string()
            ]
        ];
    }

    protected function resolve($root, $args, $context, ResolveInfo $info)
    {
        if(isset($root->{$info->fieldName}))
        {
            if(isset($args['format']))
            {
                return Carbon::parse($root->{$info->fieldName})->format($args['format']);
            }else{
                return Carbon::parse($root->{$info->fieldName})->format('Y-m-d h:i:s');
            }
        } else {
            return null;
        }

    	
    }
}