<?php

namespace App\Modules\Features\C\TypePersonIdentification\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TypePersonIdentification extends Model
{
    use SoftDeletes;

    const CREATED_AT = 'type_person_identification_created_at';
	const UPDATED_AT = 'type_person_identification_updated_at';
    const DELETED_AT = 'type_person_identification_deleted_at';
    
    protected $table = 'c_type_person_identification';
	protected $primaryKey = 'type_person_identification_id';
	protected $fillable = [
		'type_person_identification_code',
		'type_person_identification_description'
	];

	protected $dates = [
		'type_person_identification_created_at',
		'type_person_identification_updated_at',
		'type_person_identification_deleted_at'
    ];
    
}