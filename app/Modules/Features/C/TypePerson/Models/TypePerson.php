<?php

namespace App\Modules\Features\C\TypePerson\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TypePerson extends Model
{
    use SoftDeletes;

    const CREATED_AT = 'type_person_created_at';
	const UPDATED_AT = 'type_person_updated_at';
    const DELETED_AT = 'type_person_deleted_at';
    
    protected $table = 'c_type_person';
	protected $primaryKey = 'type_person_id';
	protected $fillable = [
        'type_person_code',
		'type_person_description',
	];

	protected $dates = [
		'type_person_created_at',
		'type_person_updated_at',
		'type_person_deleted_at'
    ];
    
}